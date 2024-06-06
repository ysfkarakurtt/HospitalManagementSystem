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
            background-attachment:fixed;
            background-size: cover;
        
        }
        header{
            background:#77d5cb;
        }
    </style>
    
   
    <title>Hospital Management System</title>
</head>
<body>
    <header>
            <h2>Hospital Management System</h2>
    </header>
    <link rel="stylesheet" href="style.css">
        <style>
            .tableOuter4 {
                width: 750px;
                height: 400px;
                margin: 0 auto;
                border-radius: 10px;
                background: transparent;
                }
                .sub{
                    background:blue;
                }
        </style>
    <div class="tableOuter4">
    
        <h1>LOGIN</h1>
        <form action="process.php"method="post">
            <div class="patien">
                <input type ="text" name="id" placeholder="ID Number">
            </div>
            <div class ="pass">
                <input type= "password" name="password" placeholder="password">
            </div>
            <select name="user" class="user">
            <option value="user1">Please select user</option>
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="manager">Manager</option>
        </select>
            <button type="submit" class="sub" id="login" name="login">Login</button>
            
            <br>
        </form>
        <a href ="member.php"><button type="submit" class="sub" id="sign_up">Sign Up</button></a>
    </div>
    
</body>
</html>