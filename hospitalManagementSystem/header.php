<?php 
ob_start();
session_start();
include 'connect.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
        padding: 0;
        margin: 0;
        font-family: 'helvetica', sans-serif;
        text-align: center;
        background-image: url('design/backgroundImage.jpg'); 
        background-repeat: no-repeat; 
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        }

        .exit{
            background:#77d5cb;
        }
    </style>
    <link rel="stylesheet" href=" style.css">
    <title>Hospital Management System</title>
    </head>
    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="upper_bar">
        <?php
        if(isset($_SESSION['user_type']))
        {
        ?>
        <a href ="homepage.php">
        <?php 
        }?>
        <h1>Hospital Management System</h1></a>
        <div class="menu ">
            <?php 
                if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'patient') {
                    echo '<a href="accountPatient.php">Account Information</a>';
                    echo '<a href="appointment.php">Appointment</a>';
                    echo '<a href="medicalReports.php">Medical Reports</a>';
                    }
                if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'doctor') {
                    echo '<a href="accountDoctor.php">Account Information</a>';
                    echo '<a href="appointment.php">Appointment</a>';
                    echo '<a href="medicalReports.php" class="managerOperations">Medical Reports</a>';
                    }
                if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'manager') {
                    echo '<a href="accountManager.php">Account Information</a>';
                    echo '<a href="medicalReports.php">Medical Reports</a>';
                    echo '<a href="managerOperations.php">Manager Operations</a>';
                    }
            ?> 
        </div>
    </div>
            <a href="logout.php"><div class="exit">
            Exit
    </div></a>
</body>
</html>