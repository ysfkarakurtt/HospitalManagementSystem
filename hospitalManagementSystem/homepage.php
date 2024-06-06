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
    .center_div {
        position: absolute;
        width: 45%;
        height: 500px;
        background: transparent;
        top: 150px;
        opacity: 0.8; 
    }
    
    .appointment{
        background:black;
    }

    input[type="date"]{
    width: 60%;
    margin: 10px;
    height: 50px;
    background: black;
    border-radius: 5px;
    text-align: center;
    font-size: 25px;
    color: black;
    }

    #appointment_save{
        background:green;
    }

</style>
<div class="center_div" id="appointment_div">

    <?php
    if($_SESSION['user_type']=='patient')
    {?>
    <form action="process.php" method="post">
        <input type="date"  name="date"  class="appointment">

    <select name="city" class="appointment">
        <option value="select_city">Please select city</option>
        <option value="Adana">Adana</option>
        <option value="Adıyaman">Adıyaman</option>
        <option value="Afyonkarahisar">Afyonkarahisar</option>
        <option value="Ağrı">Ağrı</option>
        <option value="Amasya">Amasya</option>
        <option value="Ankara">Ankara</option>
        <option value="Antalya">Antalya</option>
        <option value="Artvin">Artvin</option>
        <option value="Aydın">Aydın</option>
        <option value="Balıkesir">Balıkesir</option>
        <option value="Bilecik">Bilecik</option>
        <option value="Bingöl">Bingöl</option>
        <option value="Bitlis">Bitlis</option>
        <option value="Bolu">Bolu</option>
        <option value="Burdur">Burdur</option>
        <option value="Bursa">Bursa</option>
        <option value="Çanakkale">Çanakkale</option>
        <option value="Çankırı">Çankırı</option>
        <option value="Çorum">Çorum</option>
        <option value="Denizli">Denizli</option>
        <option value="Diyarbakır">Diyarbakır</option>
        <option value="Edirne">Edirne</option>
        <option value="Elazığ">Elazığ</option>
        <option value="Erzincan">Erzincan</option>
        <option value="Erzurum">Erzurum</option>
        <option value="Eskişehir">Eskişehir</option>
        <option value="Gaziantep">Gaziantep</option>
        <option value="Giresun">Giresun</option>
        <option value="Gümüşhane">Gümüşhane</option>
        <option value="Hakkâri">Hakkâri</option>
        <option value="Hatay">Hatay</option>
        <option value="Isparta">Isparta</option>
        <option value="Mersin">Mersin</option>
        <option value="İstanbul">İstanbul</option>
        <option value="İzmir">İzmir</option>
        <option value="Kars">Kars</option>
        <option value="Kastamonu">Kastamonu</option>
        <option value="Kayseri">Kayseri</option>
        <option value="Kırklareli">Kırklareli</option>
        <option value="Kırşehir">Kırşehir</option>
        <option value="Kocaeli">Kocaeli</option>
        <option value="Konya">Konya</option>
        <option value="Kütahya">Kütahya</option>
        <option value="Malatya">Malatya</option>
        <option value="Manisa">Manisa</option>
        <option value="Kahramanmaraş">Kahramanmaraş</option>
        <option value="Mardin">Mardin</option>
        <option value="Muğla">Muğla</option>
        <option value="Muş">Muş</option>
        <option value="Nevşehir">Nevşehir</option>
        <option value="Niğde">Niğde</option>
        <option value="Ordu">Ordu</option>
        <option value="Rize">Rize</option>
        <option value="Sakarya">Sakarya</option>
        <option value="Samsun">Samsun</option>
        <option value="Siirt">Siirt</option>
        <option value="Sinop">Sinop</option>
        <option value="Sivas">Sivas</option>
        <option value="Tekirdağ">Tekirdağ</option>
        <option value="Tokat">Tokat</option>
        <option value="Trabzon">Trabzon</option>
        <option value="Tunceli">Tunceli</option>
        <option value="Şanlıurfa">Şanlıurfa</option>
        <option value="Uşak">Uşak</option>
        <option value="Van">Van</option>
        <option value="Yozgat">Yozgat</option>
        <option value="Zonguldak">Zonguldak</option>
        <option value="Aksaray">Aksaray</option>
        <option value="Bayburt">Bayburt</option>
        <option value="Karaman">Karaman</option>
        <option value="Kırıkkale">Kırıkkale</option>
        <option value="Batman">Batman</option>
        <option value="Şırnak">Şırnak</option>
        <option value="Bartın">Bartın</option>
        <option value="Ardahan">Ardahan</option>
        <option value="Iğdır">Iğdır</option>
        <option value="Yalova">Yalova</option>
        <option value="Karabük">Karabük</option>
        <option value="Kilis">Kilis</option>
        <option value="Osmaniye">Osmaniye</option>
        <option value="Düzce">Düzce</option>
    </select>

    <select name="hospital" class="appointment">
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

    <select name="profession" class="appointment">
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

    <select name="doctor" class="appointment">
        <?php 
        $query = $db->query("SELECT doctor_id, name_surname FROM doctors");
        $doctors = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <option value="select_doctor">Please select doctor</option>
    <?php foreach ($doctors as $doctor): ?>
        <option value="<?php echo  $doctor['doctor_id']; ?>"><?php echo $doctor['name_surname']; ?></option>
    <?php endforeach; ?>
    </select>
    <input type="hidden" name="user" value="<?php echo $query_user['user_id']; ?>">
    <button name="appointment_save" class="appointment" id="appointment_save">Appointment Save</button>

    </form>
    <?php 
    }
    ?>

</div>

<div class="center_div" id="doctor_div">
    <h3>Notifications</h3>
    <p>
    You do not have any notifications.
    </p>

</div>
    
</body>
</html>