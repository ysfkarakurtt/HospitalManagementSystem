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
        .tableOuter3{
            background:transparent;
        }
        #sign_up{
            background:blue;
        }
    </style>
    <div class="tableOuter3">
        <h1>SIGN UP MANAGER</h1>
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


        <div class="manager">
                <input type ="text" name="manager_id" placeholder="ID Number">
            </div>
            <div class ="pass">
                <input type= "password" name="manager_password" placeholder="password">
            </div>
            <button type="submit" class="sub" id="sign_up"  name="sign_up_manager">Sign up</button>
            <br>
            </form>
            <a href ="member.php"><button type="submit" class="sub" id="member_back">Back</button></a>

        
    </div>
    
</body>
</html>