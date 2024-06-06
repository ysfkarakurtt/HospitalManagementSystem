<?php 
include 'header.php'; 
include 'process.php';

$bool=false;
$_SESSION['gender_type']=$_SESSION['gender'];

if(isset($_SESSION['patient_profile_id']))
{    
    $query_patients= $db->prepare("SELECT * FROM patients WHERE patient_id=:patient_id");
    $query_patients->execute([
        'patient_id' => $_SESSION['patient_profile_id']
        ]);

    $patient_data = $query_patients->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['patient_profile_id'])==$patient_data['patient_id'])
    {
        $bool=true;
        $_SESSION['patient_username']=$patient_data['name_surname'];
        $_SESSION['patient_birth_date']=$patient_data['birth_date'];
        $_SESSION['patient_phone_number']=$patient_data['phone_number'];
        $_SESSION['patient_address']=$patient_data['address'];
        $_SESSION['patient_gender']=$patient_data['gender'];
    }

    if($bool =='true')
    {
        $_SESSION['gender_type']=$_SESSION['patient_gender'];
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            .tableOuter{
                background:transparent;
            }
            #update{
              background:green;
            }
            #medical_reports{
            background:blue;
            }
        </style>
    <div class="tableOuter">
        <h1><?php echo $bool =='true'? 'Patient Information' : 'My Account';?></h1>
        <form action="process.php"method="post">
        
        <div class="user <?php echo $bool == 'true' ? 'readonly' : ''; ?>">
            <input type="text" name="name_surname" value="<?php echo $bool == 'true' ? $_SESSION['patient_username'] : $_SESSION['username']; ?>" <?php echo $bool == 'true' ? 'readonly' : ''; ?>>
        </div>

        <div class="date <?php echo $bool == 'true' ? 'readonly' : ''; ?>">
            <input type="date" name="birth_date" value="<?php echo $bool == 'true' ? $_SESSION['patient_birth_date'] : $_SESSION['birth_date']; ?>" <?php echo $bool == 'true' ? 'readonly' : ''; ?>>
        </div>

        <select name="gender" id="gender" <?php echo $bool == 'true' ? 'disabled' : ''; ?>>  
            <option value="female" <?php if(isset($_SESSION['gender_type']) && $_SESSION['gender_type'] == 'female') echo 'selected'; ?>>Female</option>
            <option value="male" <?php if(isset($_SESSION['gender_type']) && $_SESSION['gender_type'] == 'male') echo 'selected'; ?>>Male</option>
        </select>

            <div class="phone_number" >
            
                <input type="text" name="phone_number" value="<?php echo $bool == 'true' ? $_SESSION['patient_phone_number'] : $_SESSION['phone_number']; ?>" <?php echo $bool == 'true' ? 'readonly' : ''; ?>>
            </div>

        <div class="address">
            <input type="text" name="address" value="<?php echo $bool == 'true' ? $_SESSION['patient_address'] : $_SESSION['address']; ?>" <?php echo $bool == 'true' ? 'readonly' : ''; ?>>
        </div>

        <div class="patient">
                <input type ="text" name="patient_id" placeholder="ID Number" value="<?php  echo $bool =='true'?  $_SESSION['patient_profile_id']: $_SESSION['user_id']   ;?>"<?php echo $bool == 'true' ? 'readonly' : ''; ?>>
            </div>
            <?php
                if($bool !='true')
                { ?>
                    <div class ="pass">
                        <input type= "password" name="patient_password" placeholder="password" value="<?php  echo isset($_SESSION['patient_password']) ? $_SESSION['patient_password'] : 'null';?>">
                    </div>

                    <button type="submit" class="sub" id="update" name ="update_patient">Update</button>
                    <br>
                    <?php
                }
                    ?>
            
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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