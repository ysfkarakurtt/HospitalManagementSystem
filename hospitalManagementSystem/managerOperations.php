<?php 
include 'header.php';
include 'process.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hospital Management System</title>
</head>
<body>

<div class="name_surname">
     <h4>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h4>
</div>
<style>
    .center_div{
        background:transparent;
    }
    .button-container {
    margin-top: 100px; /* Adjust this value to move the buttons down */
}
#doctor_add{
    background:green;
}
#patient_add{
    background:green;
}
#medicial_report_add{
    background:green;
}
</style>
<div class="center_div" id="appointment_div">
<div class="button-container">
        <a href ="memberDoctor.php"><button type="submit" class="sub" id="doctor_add">Add Doctor </button></a>
        <a href ="memberPatient.php"><button type="submit" class="sub" id="patient_add"> Add Patient</button></a>
        <a href ="medicalReports.php"><button type="submit" class="sub" id="medicial_report_add"> Add Medicial Report</button></a>

    </form>
    </div>
</div>

<div class="center_div" id="doctor_div">
    <h3>Manager Operations</h3>
    <p>
        You dont have any operations.
    </p>

</div>
    
</body>
</html>