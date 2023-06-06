<?php
    include 'config/config.php';


    if(isset($_POST['addappointment'])){

        $appdate = $_POST['appdate'];
        $apptime = $_POST['apptime'];
        $patientname = $_POST['patientname'];
        $patientbday = $_POST['birthdate'];
        $patientadd = $_POST['patientaddress'];
        $patientemail = $_POST['patientemail'];
        $patientcontact = $_POST['patientcontact'];
        $apptype = $_POST['appointmenttype'];

        $sql = "INSERT INTO tbl_appointment(appointment_date,appointment_time,patient_name,patient_birthdate,patient_address,patient_email,patient_contact,appointment_type)
        VALUES('$appdate','$apptime','$patientname','$patientbday','$patientadd','$patientemail','$patientcontact','$apptype')";

        $result = mysqli_query($conn,$sql) or die();
  
        if ($result){
            echo ("<script language='javascript'>
       window.alert('APPOINTMENT SET. CHECK YOUR EMAIL FOR VERIFICATION.')
       window.location.href='index.php'
       </script>");
       }else{
        echo ("<script language='javascript'>
        window.alert('INVALID FIELDS!!!')
        window.location.href='appointment.php'
        </script>");
       }
  
    }

    
?>