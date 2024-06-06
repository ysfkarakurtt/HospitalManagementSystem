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
                background-attachment:fixed;
                background-size: cover;
            }

                .tableOuter3{
                    background:transparent;
                }
                #update{

                    background:green;
                }
                
        </style>
    <div class="tableOuter3">
        <h1>My Account</h1>
        <form action="process.php"method="post">
        <div class="user">
                <input type ="text" name="name_surname" value="<?php  echo isset($_SESSION['username']) ? $_SESSION['username'] : 'null';?>">
            </div>

            <div class= "date" name="date">    
                <input type="date" name="birth_date"value="<?php  echo isset($_SESSION['birth_date']) ? $_SESSION['birth_date'] : 'null';?>">
            </div>

            <select name="gender" id="gender">
                <option value="female" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female') echo 'selected'; ?>>Female</option>
                <option value="male" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male') echo 'selected'; ?>>Male</option>
            </select>

            <div class="manager">
                <input type ="text" name="manager_id" placeholder="ID Number" value="<?php  echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null';?>">
            </div>
            <div class ="pass">
                <input type= "password" name="manager_password" placeholder="password" value="<?php  echo isset($_SESSION['manager_password']) ? $_SESSION['manager_password'] : 'null';?>">
            </div>
            <button type="submit" class="sub" id="update" name ="update_manager">Update</button>
            <br>
            </form>
            <a href ="homepage.php"><button type="submit" class="sub" id="member_back">Back</button></a>
        
    </div>
    
</body>
</html>