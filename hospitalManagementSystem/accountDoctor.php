<?php 
include 'header.php';

$bool=false;
$_SESSION['doctor_gender_type']=$_SESSION['gender'];

if(isset($_GET['doctor_id']))
{
    $doctor_id = $_GET['doctor_id'];
    $query_doctors= $db->prepare("SELECT * FROM doctors WHERE doctor_id=:doctor_id");
    $query_doctors->execute([
    'doctor_id' => $doctor_id
    ]);
    
    $doctor_data = $query_doctors->fetch(PDO::FETCH_ASSOC);

    if(isset($_GET['doctor_id'])==$doctor_data['doctor_id']){
        $bool=true;
        $_SESSION['doctor_username']=$doctor_data['name_surname'];
        $_SESSION['doctor_birth_date']=$doctor_data['birth_date'];
        $_SESSION['doctor_profession']=$doctor_data['profession'];
        $_SESSION['doctor_hospital']=$doctor_data['hospital'];
        $_SESSION['doctor_gender']=$doctor_data['gender'];
    }

    if($bool =='true'){
        $_SESSION['doctor_gender_type']=$_SESSION['doctor_gender'];
    }
}
        
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
            .tableOuter2{
                background:transparent;
            }
            #update{
            background:green;
            }
            #medical_reports{
            background:blue;
            }
        </style>
    <div class="tableOuter2">
        <h1><?php echo $bool =='true'? 'Doctor Information' : 'My Account';?></h1>
        <form action="process.php"method="post">
        <div class="user <?php echo $bool == 'true' ? 'readonly' : ''; ?>">
                <input type ="text" name="name_surname" value="<?php echo $bool == 'true' ? $_SESSION['doctor_username'] : $_SESSION['username']; ?>" <?php echo $bool == 'true' ? 'readonly' : ''; ?>>
            </div>

            <div class= "date <?php echo $bool == 'true' ? 'readonly' : ''; ?>" name="date">    
                <input type="date" name="birth_date" value="<?php echo $bool == 'true' ? $_SESSION['doctor_birth_date'] : $_SESSION['birth_date']; ?>" <?php echo $bool == 'true' ? 'readonly' : ''; ?>>
            </div>

            <select name="gender" id="gender" <?php echo $bool == 'true' ? 'disabled' : ''; ?>>
            <option value="female" <?php if(isset($_SESSION['doctor_gender_type']) && $_SESSION['doctor_gender_type'] == 'male') echo 'selected'; ?>>Female</option>
            <option value="male" <?php if(isset($_SESSION['doctor_gender_type']) && $_SESSION['doctor_gender_type'] == 'male') echo 'selected'; ?>>Male</option>
            </select>

            <select name="profession" id="profession" <?php echo $bool == 'true' ? 'disabled' : ''; ?>>
                <option value="internal_medicine" <?php if(isset($_SESSION['doctor_profession']) && $_SESSION['doctor_profession'] == 'internal_medicine') echo 'selected'; ?>>Internal Medicine</option>
                <option value="eye_diseases"<?php if(isset($_SESSION['doctor_profession']) && $_SESSION['doctor_profession'] == 'eye_diseases') echo 'selected'; ?>>Eye Diseases</option>
                <option value="ear_nose_throat" <?php if(isset($_SESSION['doctor_profession']) && $_SESSION['doctor_profession'] == 'ear_nose_throat') echo 'selected'; ?>>Ear Nose Throat</option>
                <option value="orthopedics" <?php if(isset($_SESSION['doctor_profession']) && $_SESSION['doctor_profession'] == 'orthopedics') echo 'selected'; ?>>Orthopedics</option>
            </select>

            <select name="hospital" class="hospital"<?php echo $bool == 'true' ? 'disabled' : ''; ?>>
                <option value="acibadem_hospital" <?php if(isset($_SESSION['doctor_hospital']) && $_SESSION['doctor_hospital'] == 'acibadem_hospital') echo 'selected'; ?>>Acıbadem Hospital</option>
                <option value="akdamar_hospital" <?php if(isset($_SESSION['doctor_hospital']) && $_SESSION['doctor_hospital'] == 'akdamar_hospital') echo 'selected'; ?>>Akdamar Hospital</option>
                <option value="hayat_hospital" <?php if(isset($_SESSION['doctor_hospital']) && $_SESSION['doctor_hospital'] == 'hayat_hospital') echo 'selected'; ?>>Hayat Hospital</option>
                <option value="bolge_egitim_arastirma_hospital" <?php if(isset($_SESSION['doctor_hospital']) && $_SESSION['doctor_hospital'] == 'bolge_egitim_arastirma_hospital') echo 'selected'; ?>>Bölge Eğitim Araştırma Hospital</option>
            </select>

        <div class="doctor">
                <input type ="text" name="doctor_id" placeholder="ID Number" value="<?php  echo $bool =='true'?  $_GET['doctor_id']: $_SESSION['user_id']   ;?>"<?php echo $bool == 'true' ? 'readonly' : ''; ?>>
            </div>
            <?php
                if($bool !='true')
                { ?>
                    <div class ="pass">
                        <input type= "password" name="doctor_password" placeholder="password" value="<?php  echo isset($_SESSION['doctor_password']) ? $_SESSION['doctor_password'] : 'null';?>">
                    </div>
                    <button type="submit" class="sub" id="update" name="update_doctor">Update</button>
                    <br>
                <?php
                }
                ?>
            </form>
            <a href ="<?php   echo $bool == 'true' ? 'appointment.php' : 'homepage.php'; ?>"><button type="submit" class="sub" id="member_back">Back</button></a>
            <?php
                if($bool=='true')
                { ?>

                    <a href ="medicalReportsList.php"><button type="submit" class="sub" id="medical_reports">Medical Reports</button></a>
                    <?php 
                } 
                    ?>
    </div>
    
</body>
</html>