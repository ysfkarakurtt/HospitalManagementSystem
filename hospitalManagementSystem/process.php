<?php
include 'connect.php';
ob_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

global $user_id;
global $user_password;
global $user_type;

if(isset($_POST['sign_up_patient']))
{
    $name_surname=isset($_POST['name_surname']) ? $_POST['name_surname'] :null;
    $birth_date=isset($_POST['date']) ? $_POST['date'] :null;
    $gender=isset($_POST['gender']) ? $_POST['gender'] :null;
    $phone_number=isset($_POST['phone_number']) ? $_POST['phone_number'] :null;
    $address=isset($_POST['address']) ? $_POST['address'] :null;
    $patient_id=isset($_POST['patient_id']) ? $_POST['patient_id'] :null;
    $patient_password=isset($_POST['patient_password']) ? $_POST['patient_password'] :null;


    $query=$db->prepare('INSERT INTO patients SET

        name_surname =?,
        birth_date =?,
        gender =?,
        phone_number=?,
        address=?,
        patient_id=?,
        patient_password=?

    ');
    global $add;
    if(($_POST['name_surname']) =='' || ($_POST['gender'])=='gender'|| ($_POST['phone_number'])=='' || ($_POST['address'])=='' || ($_POST['patient_id'])=='' || ($_POST['patient_password']=='')  || ($_POST['date'])=='' )
    {
        

    }
    else{ 
    $add= $query->execute([
        $name_surname,$birth_date,$gender,$phone_number,$address,$patient_id,$patient_password

    ]);
    }

    if($add){
        header('location:index.php?status=success');
    }
    else{

        $error =$query->errorInfo();
        header('location:memberPatient.php?status=failed');
    }

}

if(isset($_POST['sign_up_doctor']))
{
    $name_surname=isset($_POST['name_surname']) ? $_POST['name_surname'] :null;
    $birth_date=isset($_POST['date']) ? $_POST['date'] :null;
    $gender=isset($_POST['gender']) ? $_POST['gender'] :null;
    $profession=isset($_POST['profession']) ? $_POST['profession'] :null;
    $hospital=isset($_POST['hospital']) ? $_POST['hospital'] :null;
    $doctor_id=isset($_POST['doctor_id']) ? $_POST['doctor_id'] :null;
    $doctor_password=isset($_POST['doctor_password']) ? $_POST['doctor_password'] :null;

    $query=$db->prepare('INSERT INTO doctors SET

    name_surname =?,
    birth_date =?,
    gender =?,
    profession=?,
    hospital=?,
    doctor_id=?,
    doctor_password=?
');
global $add;
if(($_POST['name_surname'])=='' ||$_POST['gender']=='gender'||  ($_POST['profession'])=='select_profession' || ($_POST['hospital'])=='select_hospital' || ($_POST['doctor_id'])=='' || $_POST['doctor_password']=='' || ($_POST['date'])=='' )
{
    

}
else{
$add= $query->execute([
    $name_surname,$birth_date,$gender,$profession,$hospital,$doctor_id,$doctor_password

]);
}

if($add){
    header('location:index.php?status=success');
}
else{

    $error =$query->errorInfo();
        header('location:memberDoctor.php?status=failed');
}


}

if(isset($_POST['sign_up_manager'])){
    $name_surname=isset($_POST['name_surname']) ? $_POST['name_surname'] :null;
    $birth_date=isset($_POST['date']) ? $_POST['date'] :null;
    $gender=isset($_POST['gender']) ? $_POST['gender'] :null;
    $manager_id=isset($_POST['manager_id']) ? $_POST['manager_id'] :null;
    $manager_password=isset($_POST['manager_password']) ? $_POST['manager_password'] :null;

    $query=$db->prepare('INSERT INTO managers SET

    name_surname =?,
    birth_date =?,
    gender =?,
    manager_id=?,
    manager_password=?

');
if(($_POST['name_surname'])=='' ||($_POST['gender'])=='gender'  || ($_POST['manager_id'])=='' || ($_POST['manager_password']=='') || ($_POST['date'])==''  )
    {
        

    }
    else{
    $add= $query->execute([
    $name_surname,$birth_date,$gender,$manager_id,$manager_password
    ]);
    }

    if($add){
    
            header('location:index.php?status=success');
        
    }
    else{
       
            echo '<script>';
            echo 'window.location.href = "index.php";'; 
            echo 'alert("Wrong  user not null");'; 
            echo '</script>';
            header('location:memberManager.php?status=failed');
        
    }
}


if(isset($_POST['login'])){
  
    $user_type=$_POST['user'];
    $_SESSION['user_type']=$user_type;
    
    if($user_type=='patient'){
         $user_id = $_POST['id'];
         $user_password=$_POST['password']; 
        
         $query_user=$db->prepare("SELECT * FROM patients WHERE patient_id=:patient_id and patient_password=:patient_password");
         
         $query_user->execute([
            'patient_id'=>$user_id,
            'patient_password'=>$user_password,
            ]);
         $user = $query_user->fetch(PDO::FETCH_ASSOC);
        
        if($user) {
           
           $_SESSION['username'] = $user['name_surname'];
           $_SESSION['birth_date']=$user['birth_date'];
           $_SESSION['gender']=$user['gender'];
           $_SESSION['phone_number']=$user['phone_number'];
           $_SESSION['address']=$user['address'];
           $_SESSION['user_id']=$user['patient_id'];
           $_SESSION['patient_password']=$user['patient_password'];
        }
        
        $count= $query_user->rowCount();
        if($count==1){
            $_SESSION['user_id']=$user_id;
            header('location:homepage.php?status=success');
            exit;
        }else{
            header('location:index.php?status=failed');
            exit;
        }

    }

    if($user_type=='doctor'){
        $user_id =$_POST['id'];
        $user_password=$_POST['password'];
        
        $query_user=$db->prepare("SELECT * FROM doctors WHERE doctor_id=:doctor_id and doctor_password=:doctor_password");
        $query_user->execute([

            'doctor_id'=>$user_id,
            'doctor_password'=>$user_password
            ]);

        $user = $query_user->fetch(PDO::FETCH_ASSOC);
        if($user) {
            
           $_SESSION['username'] = $user['name_surname'];
           $_SESSION['birth_date']=$user['birth_date'];
           $_SESSION['gender']=$user['gender'];
           $_SESSION['profession']=$user['profession'];
           $_SESSION['hospital']=$user['hospital'];
           $_SESSION['user_id']=$user['doctor_id'];
           $_SESSION['doctor_password']=$user['doctor_password'];
        }

        $count= $query_user->rowCount();
        if($count==1){
            $_SESSION['user_id']=$user_id;
            header('location:homepage.php?status=success');
            exit;
        }else{
            header('location:index.php?status=failed');
            exit;
        }
    }

    if($user_type=='manager'){
        $user_id =$_POST['id'];
        $user_password=$_POST['password'];
        
        $query_user=$db->prepare("SELECT * FROM managers WHERE manager_id=:manager_id and manager_password=:manager_password");
        $query_user->execute([

            'manager_id'=>$user_id,
            'manager_password'=>$user_password
        ]);

        $user = $query_user->fetch(PDO::FETCH_ASSOC);
        if($user) {
           
           $_SESSION['username'] = $user['name_surname'];
           $_SESSION['birth_date']=$user['birth_date'];
           $_SESSION['gender']=$user['gender'];
           $_SESSION['manager_password']=$user['manager_password'];
        }

        $count= $query_user->rowCount();
        if($count==1){
            $_SESSION['user_id']=$user_id;
            header('location:homepage.php?status=success');
            exit;
        }else{

            header('location:index.php?status=failed');
            exit;
        }
    }
    
    if($user_type=='user1')
    {
        echo '<script>';
        echo 'window.location.href = "index.php";'; 
        echo 'alert("Wrong  user not null");'; 
        echo '</script>';
        header("location:index.php?user=NULL");
    }
   


}

if(isset($_POST['appointment_save'])){

    $user_id = $_SESSION['user_id'];
    $save=$db->prepare("INSERT INTO appointments SET

        appointment_city =:appointment_city,
        appointment_hospital =:appointment_hospital,
        appointment_doctor_id =:appointment_doctor_id,
        appointment_date=:appointment_date,
        appointment_profession=:appointment_profession,
        patient_id=:patient_id
      
    
    ");
    
    if( ($_POST['date'])=='' || ($_POST['city'])=='select_city' || ($_POST['hospital'])=='select_hospital' || ($_POST['profession']=='select_profession') || ($_POST['doctor']=='select_doctor') )
    {
        

    }
    else{ 

   
    $insert=$save->execute([
        "appointment_city" => $_POST["city"],
        "appointment_hospital" =>$_POST["hospital"],
        "appointment_doctor_id" =>$_POST["doctor"],
        "appointment_date"=>$_POST["date"],
        "appointment_profession"=> $_POST["profession"],
        "patient_id" =>$user_id

    ]);
    
    }

if($insert){
    header("location:homepage.php?save_succesful");
}
else{
    header("location:homepage.php?save_unsuccesful");
   
} 
}

if(isset($_POST['update_patient'])){

    $name_surname= $_POST['name_surname'] ;
    $birth_date= $_POST['birth_date'] ;
    $gender= $_POST['gender'];
    $phone_number=$_POST['phone_number'] ;
    $address= $_POST['address'] ;
    $patient_id= $_POST['patient_id'];
    $patient_password= $_POST['patient_password'];

    $user_id=$_SESSION['user_id'];
    $query=$db->prepare('UPDATE patients SET

    name_surname = :name_surname,
    birth_date = :birth_date,
    gender = :gender,
    phone_number = :phone_number,
    address = :address,
    patient_password = :patient_password,
    patient_id=:user_id
    WHERE 
        patient_id=:user_id');

    $add= $query->execute([
        ':name_surname' => $name_surname,
        ':birth_date' => $birth_date,
        ':gender' => $gender,
        ':phone_number' => $phone_number,
        ':address' => $address,
        ':patient_password' => $patient_password,
        ':user_id' => $user_id

    ]);
    if($add){  
    
        if(isset($_SESSION['username'])) {
            $_SESSION['username'] = $_POST['name_surname'];
        }
        if(isset($_SESSION['birth_date'])) {
            $_SESSION['birth_date'] = $_POST['birth_date'];
        }
        if(isset($_SESSION['gender'])) {
            $_SESSION['gender'] = $_POST['gender'];
        }
        if(isset($_SESSION['phone_number'])) {
            $_SESSION['phone_number'] = $_POST['phone_number'];
        }
        if(isset($_SESSION['address'])) {
            $_SESSION['address'] = $_POST['address'];
        }
        if(isset($_SESSION['user_id'])) {
            $_SESSION['user_id'] = $_POST['patient_id'];
        }
        if(isset($_SESSION['patient_password'])) {
            $_SESSION['patient_password'] = $_POST['patient_password'];
        }
    
        echo '<script>';
        echo 'window.location.href = "accountPatient.php";'; 
        echo 'alert("Update Successful!");'; 
        echo '</script>';
    }
    else{
        $error =$query->errorInfo();
        echo 'mysql error' .$error[2];
    }
}

if(isset($_POST['update_doctor'])){

    $name_surname= $_POST['name_surname'] ;
    $birth_date= $_POST['birth_date'] ;
    $gender= $_POST['gender'];
    $profession=$_POST['profession'] ;
    $hospital= $_POST['hospital'] ;
    $doctor_id= $_POST['doctor_id'];
    $doctor_password= $_POST['doctor_password'];

    $user_id=$_SESSION['user_id'];
    $query=$db->prepare('UPDATE doctors SET

    name_surname = :name_surname,
    birth_date = :birth_date,
    gender = :gender,
    profession = :profession,
    hospital = :hospital,
    doctor_password = :doctor_password,
    doctor_id=:user_id
    WHERE 
        doctor_id=:user_id');

    $add= $query->execute([
        ':name_surname' => $name_surname,
        ':birth_date' => $birth_date,
        ':gender' => $gender,
        ':profession' => $profession,
        ':hospital' => $hospital,
        ':doctor_password' => $doctor_password,
        ':user_id' => $user_id

    ]);
    if($add){   
    
        if(isset($_SESSION['username'])) {
            $_SESSION['username'] = $_POST['name_surname'];
        }
        if(isset($_SESSION['birth_date'])) {
            $_SESSION['birth_date'] = $_POST['birth_date'];
        }
        if(isset($_SESSION['gender'])) {
            $_SESSION['gender'] = $_POST['gender'];
        }
        if(isset($_SESSION['profession'])) {
            $_SESSION['profession'] = $_POST['profession'];
        }
        if(isset($_SESSION['hospital'])) {
            $_SESSION['hospital'] = $_POST['hospital'];
        }
        if(isset($_SESSION['user_id'])) {
            $_SESSION['user_id'] = $_POST['doctor_id'];
        }
        if(isset($_SESSION['doctor_password'])) {
            $_SESSION['doctor_password'] = $_POST['doctor_password'];
        }
        
        echo '<script>';
        echo 'window.location.href = "accountDoctor.php";'; 
        echo 'alert("Update Successful!");'; 
        echo '</script>';

    }
    else{
        $error =$query->errorInfo();
        echo 'mysql error' .$error[2];
    }
}

if(isset($_POST['update_manager'])){

    $name_surname= $_POST['name_surname'] ;
    $birth_date= $_POST['birth_date'] ;
    $gender= $_POST['gender'];
   
    $manager_id= $_POST['manager_id'];
    $manager_password= $_POST['manager_password'];

    $user_id=$_SESSION['user_id'];
    $query=$db->prepare('UPDATE managers SET

    name_surname = :name_surname,
    birth_date = :birth_date,
    gender = :gender,
    manager_password = :manager_password,
    manager_id=:user_id
    WHERE 
        manager_id=:user_id');

    $add= $query->execute([
        ':name_surname' => $name_surname,
        ':birth_date' => $birth_date,
        ':gender' => $gender,
        ':manager_password' => $manager_password,
        ':user_id' => $user_id

    ]);
    if($add){   
    
        if(isset($_SESSION['username'])) {
            $_SESSION['username'] = $_POST['name_surname'];
        }   
        if(isset($_SESSION['birth_date'])) {
            $_SESSION['birth_date'] = $_POST['birth_date'];
        }
        if(isset($_SESSION['gender'])) {
            $_SESSION['gender'] = $_POST['gender'];
        }
        if(isset($_SESSION['user_id'])) {
            $_SESSION['user_id'] = $_POST['manager_id'];
        }
        if(isset($_SESSION['manager_password'])) {
            $_SESSION['manager_password'] = $_POST['manager_password'];
        }
    echo '<script>';
    echo 'window.location.href = "accountManager.php";'; 
    echo 'alert("Update Successful!");'; 
    echo '</script>';

    }
    else{
        $error =$query->errorInfo();
        echo 'mysql error' .$error[2];
    }
}

if(isset($_POST['update_doctor'])){

    $name_surname= $_POST['name_surname'] ;
    $birth_date= $_POST['birth_date'] ;
    $gender= $_POST['gender'];
    $profession=$_POST['profession'] ;
    $hospital= $_POST['hospital'] ;
    $doctor_id= $_POST['doctor_id'];
    $doctor_password= $_POST['doctor_password'];

    $user_id=$_SESSION['user_id'];
    $query=$db->prepare('UPDATE doctors SET

    name_surname = :name_surname,
    birth_date = :birth_date,
    gender = :gender,
    profession = :profession,
    hospital = :hospital,
    doctor_password = :doctor_password,
    doctor_id=:user_id
    WHERE 
        doctor_id=:user_id');

    $add= $query->execute([
        ':name_surname' => $name_surname,
        ':birth_date' => $birth_date,
        ':gender' => $gender,
        ':profession' => $profession,
        ':hospital' => $hospital,
        ':doctor_password' => $doctor_password,
        ':user_id' => $user_id

    ]);
    if($add){   
    
        if(isset($_SESSION['username'])) {
            $_SESSION['username'] = $_POST['name_surname'];
        }
        if(isset($_SESSION['birth_date'])) {
            $_SESSION['birth_date'] = $_POST['birth_date'];
        }
        if(isset($_SESSION['gender'])) {
            $_SESSION['gender'] = $_POST['gender'];
        }
        if(isset($_SESSION['profession'])) {
            $_SESSION['profession'] = $_POST['profession'];
        }
        if(isset($_SESSION['hospital'])) {
            $_SESSION['hospital'] = $_POST['hospital'];
        }
        if(isset($_SESSION['user_id'])) {
            $_SESSION['user_id'] = $_POST['doctor_id'];
        }
        if(isset($_SESSION['doctor_password'])) {
            $_SESSION['doctor_password'] = $_POST['doctor_password'];
        }
    echo '<script>';
    echo 'window.location.href = "accountDoctor.php";'; 
    echo 'alert("Update Successful!");'; 
    echo '</script>';
    }
    else{
        $error =$query->errorInfo();
        echo 'mysql error' .$error[2];
    }
}
?>
