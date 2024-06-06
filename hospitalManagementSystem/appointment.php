<?php 
include 'header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
</head>
<body>

<table>
    <?php 
        if($_SESSION['user_type']=='patient')
        {
            $query_appointment= $db->prepare("SELECT * FROM appointments
            JOIN patients ON appointments.patient_id = patients.patient_id WHERE patients.patient_id=:patient_id");
            
            $query_appointment->execute([
            'patient_id' => $_SESSION['user_id']
            ]);
    
    ?>
      <tr>
        <th>Doctor</th>
        <th>Profession</th>
        <th>City</th>
        <th>Hospital</th>
        <th>Date</th>
    </tr> 
    <?php
        while ($pull_appointment = $query_appointment->fetch(PDO::FETCH_ASSOC))
         {
    ?>

    <tr>
    <?php 
        $query_doctors= $db->prepare("SELECT * FROM doctors WHERE doctor_id=:doctor_id");
        
        $query_doctors->execute([
            'doctor_id' => $pull_appointment['appointment_doctor_id']
        ]);

        $doctor_data = $query_doctors->fetch(PDO::FETCH_ASSOC);
        ?>
        <td><a href="accountDoctor.php?doctor_id=<?php echo $doctor_data['doctor_id']; ?>"><?php echo $doctor_data['name_surname']; ?></a></td>
        <td><?php echo $pull_appointment['appointment_profession']; ?></td>
        <td><?php echo $pull_appointment['appointment_city']; ?></td>
        <td><?php echo $pull_appointment['appointment_hospital']; ?></td>
        <td><?php echo $pull_appointment['appointment_date']; ?></td>
    </tr>
    <?php 
    }} 
    ?>

    <?php 
        if($_SESSION['user_type']=='doctor')
            {
                $query_appointment= $db->prepare("SELECT * FROM appointments
                JOIN doctors ON appointments.appointment_doctor_id = doctors.doctor_id WHERE doctors.doctor_id=:doctor_id");
        
                $query_appointment->execute([
                'doctor_id' => $_SESSION['user_id']
                ]);
    ?>
      <tr>
        <th>Patient</th>
        <th>Profession</th>
        <th>City</th>
        <th>Hospital</th>
        <th>Date</th>
    </tr> 
    
    <?php
        while ($pull_appointment = $query_appointment->fetch(PDO::FETCH_ASSOC)) { 
                
    ?>

    <tr>
    <?php 
        $query_patients= $db->prepare("SELECT * FROM patients WHERE patient_id=:patient_id");
        
        $query_patients->execute([
            'patient_id' => $pull_appointment['patient_id']
        ]);
        
        $patient_data = $query_patients->fetch(PDO::FETCH_ASSOC);
        $_SESSION['patient_profile_id']=$patient_data['patient_id'];
        ?>
        <td><a href="accountPatient.php"><?php echo $patient_data['name_surname']; ?></a></td>
        <td><?php echo $pull_appointment['appointment_profession']; ?></td>
        <td><?php echo $pull_appointment['appointment_city']; ?></td>
        <td><?php echo $pull_appointment['appointment_hospital']; ?></td>
        <td><?php echo $pull_appointment['appointment_date']; ?></td>
    </tr>
    <?php 
    }} 
    ?>
    </table>
</body>
</html>