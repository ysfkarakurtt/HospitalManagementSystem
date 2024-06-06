<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hospital Management System</title>
</head>
<body>
    <header>
            <h2>Hospital Management System</h2>
    </header>
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
        #doctor_sign_up{
        background:blue;
        }
        #patient_sign_up{
        background:blue;
        }
        #manager_sign_up{
        background:blue;
        }
    
    </style>
    <div class="tableOuter2">
        <h1>SIGN UP</h1>
        <form action="process.php"method="post">
       
            <br>
            </form>
            <a href ="memberDoctor.php"><button type="submit" class="sub" id="doctor_sign_up">Doctor Sign Up</button></a>
        <a href ="memberPatient.php"><button type="submit" class="sub" id="patient_sign_up">Patient Sign Up</button></a>
        <a href ="memberManager.php"><button type="submit" class="sub" id="manager_sign_up">Manager Sign Up</button></a>
            <a href ="index.php"><button type="submit" class="sub" id="member_back">Back</button></a>
        
    </div>
    
</body>
</html>