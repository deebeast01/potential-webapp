<?php
    include 'config/config.php';

    
    /** GET THE ID FROM DELETE BUTTON AND QUERY TO DELETE */
    if (isset($_GET['delete'])) {
        
        $aid = $_GET['delete'];
        $sql = "DELETE FROM tbl_appointment WHERE appointment_id = $aid";
        $result = mysqli_query($conn,$sql);

        if ($result){
                 echo ("<script language='javascript'>
            window.location.href='header.php?load=page3'
            </script>");
            }
    }

/** GET DATA FROM FORM AND QUERY TO UPDATE THE DATA IN THE DB */
    if(isset($_POST['editappointment'])){

        $aid = $_POST['id'];
        $patientname = $_POST['patientname'];
        $patientbday = $_POST['patientbirthdate'];
        $patientaddress = $_POST['patientaddress'];
        $patientcontact = $_POST['patientcontact'];
        $patientemail = $_POST['patientemail'];
        $apptype = $_POST['apptype'];
        $appdate = $_POST['appdate'];
        $apptime = $_POST['apptime'];
        $appstatus = $_POST['appstatus'];

        $sql = "UPDATE tbl_appointment set  appointment_date='$appdate',
                                         appointment_time='$apptime',
                                         patient_name='$patientname',
                                         patient_birthdate='$patientbday',
                                         patient_address='$patientaddress',
                                         patient_email='$patientemail',
                                         patient_contact='$patientcontact',
                                         appointment_type='$apptype',
                                         appointment_status='$appstatus' WHERE appointment_id = '$aid'
                                         ";
        
        $result = mysqli_query($conn,$sql);

        if($result){
            echo ("<script language='javascript'>
            window.alert('Updated Appointment!!!')
            window.location.href='header.php?load=page3'
            </script>");
        }else{
            echo ("<script language='javascript'>
            window.alert('INVALID FIELDS!!!')
            window.location.href='header.php?load=page3'
            </script>");
           }
      

    }

    ?>