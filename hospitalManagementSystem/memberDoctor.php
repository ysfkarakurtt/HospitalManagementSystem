<?php 
include 'header.php';
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

        .tableOuter2{
        background:transparent;
        }
        #sign_up{
            background:blue;
        }
    </style>

    <div class="tableOuter2">
        <h1> <?php echo isset($_SESSION['user_type']) =='manager'? 'Add Doctor' : 'SIGN UP Doctor';?></h1>
        <form action="process.php"method="post">
        <div class="user">
                <input type ="text" name="name_surname" placeholder="name surname">
            </div>

            <div class= "date" name="date">    
                <input type="date" name="date">
            </div>

            <select name="gender" id="gender">
            <option value="gender">Please select gender</option>
                <option value="female">Female</option>
                <option value="male">Male</option>

            </select>

            <select name="profession" class="profession">
            <option value="select_profession">Please select profession</option>
                <option value="İnternal Medicine">İnternal Medicine</option>
                <option value="Eye Diseases">Eye Diseases</option>
                <option value="Ear Nose Throat">Ear Nose Throat</option>
                <option value="Orthopedics">Orthopedics</option>
                <option value="Dentistry">Dentistry</option>
                <option value="Psychiatry">Psychiatry</option>
                <option value="Stomach Diseases">Stomach Diseases</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Urology">Urology</option>
                <option value="Plastic Surgery">Plastic Surgery</option>
            </select>

         <select name="hospital" class="hospital">
         <option value="select_hospital">Please select hospital</option>
        <option value="Acıbadem Hospital">Acıbadem Hospital</option>
        <option value="Medipol Hospital">Medipol Hospital</option>
        <option value="Akdamar Hospital">Akdamar Hospital</option>
        <option value="Hayat Hospital">Hayat Hospital</option>
        <option value="Konak Hospital">Konak Hospital</option>
        <option value="Kocaeli University Hospital">Kocaeli University Hospital</option>
        <option value="Okan Hospital">Okan Hospital</option>
        <option value="Koç Hospital">Koç Hospital</option>
        </select>

        <div class="doctor">
                <input type ="text" name="doctor_id" placeholder="ID Number">
            </div>
            <div class ="pass">
                <input type= "password" name="doctor_password" placeholder="password">
            </div>
            <button  type="submit" class="sub" id="sign_up" name="sign_up_doctor"><?php echo isset($_SESSION['user_type']) =='manager'? 'Add Doctor' : 'SIGN UP Doctor';?></button>
            <br>
            </form>
            <a href=" <?php echo isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'manager' ? 'managerOperations.php' : 'member.php'; ?> ">
            <button type="submit" class="sub" id="member_back">Back</button></a>
        
    </div>
    
</body>
</html>