<h1>EDIT APPOINTMENT DETAILS</h1>
<?php

use LDAP\Result;

    include 'config/config.php';

    /** GET DATA FROM EDIT FORM ,COMPARE TO DB AND DISPLAY BACK INTO THE FORM FOR EDIT */
    $patient_name = '';
    $patient_birthdate = '';
    $patient_address = '';
    $patient_contact = '';
    $patient_email = '';
    $appointment_type = '';
    $appointment_date = '';
    $appointment_time = '';
    $appointment_status = '';

    if(isset($_GET['edit'])){

        $aid =$_GET['edit'];
        $sql = "SELECT * FROM tbl_appointment WHERE appointment_id =$aid";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            $aid =$row['appointment_id'];
            $patient_name =$row['patient_name'];
            $patient_birthdate =$row['patient_birthdate'];
            $patient_address =$row['patient_address'];
            $patient_contact =$row['patient_contact'];
            $patient_email =$row['patient_email'];
            $appointment_type =$row['appointment_type'];
            $appointment_date =$row['appointment_date'];
            $appointment_time =$row['appointment_time'];
            $appointment_status =$row['appointment_status'];
           
        }
    }
?>

<style>
    h1{
        Color:Red;
        text-align:center;
        margin-top:3%;
    }
    .editemployeeform{
        width:500px;
        height:580px;
        margin-left:36%;   
    }
    .inf{
        font-family:Calibri;
        font-size:25px;
    }
    .infg{
        width:100%;
        height:8%;
        border-radius:12px;
    }
    .inft{
        width:30%;
        height:8%;
        border-radius:12px;
    }
    .empasa{
        margin-bottom:2%;
        width:100%;
        height:8%;
        border-radius:12px;
        background-color:red;
        color:white;
    }
    .empasa:hover{
        cursor:pointer;
        box-shadow:0 0 10px gray;
    }
    a:link { text-decoration: none; }
    a{
        color:white;

    }
</style>

<div class="editemployeeform">
    <form action="delete_appointment.php" method="POST">
        <input type="hidden" name="id" value="<?=$aid;?>">   
        <label class="inf">Patient Name : </label><br>
        <input class="infg" type="text" name="patientname" value="<?=$patient_name;?>"><br>
        <label class="inf">Patient Birthdate : </label><br>
        <input class="infg" type="text" name="patientbirthdate" value="<?=$patient_birthdate;?>"><br>
        <label class="inf">Patient Address : </label><br>
        <input class="infg" type="text" name="patientaddress" value="<?=$patient_address;?>"><br>
        <label class="inf">Patient Contact : </label><br>
        <input class="infg" type="text" name="patientcontact" value="<?=$patient_contact;?>"><br>
        <label class="inf">Patient Email : </label><br>
        <input class="infg" type="text" name="patientemail" value="<?=$patient_email;?>"><br>
        <label class="inf">Appointment Type : </label><br>
        <select class="infg" name="apptype" value="<?=$appointment_type;?>">
                <option value="DXRAY">DIGITAL X-RAY</option>
                <option value="CLAB">CLINICAL LABORATORY</option>
                <option value="DRTEST">DRUG TESTING</option>
                <option value="ECG">ELECTROCARDIOGRAPHY</option>
                <option value="AUSCR">AUDIO SCREENING</option>
                <option value="UTSND">ULTRASOUND</option>
                <option value="PPSMR">PAPSMEAR</option>
                <option value="HSCALL">HOUSECALL</option>
        </select><br>
        <label class="inf">Appointment Date & Time : </label><br>
        <input class="inft" type="date" name="appdate" class="" value="<?=$appointment_date;?>" required/>
        <input class="inft" type="time" name="apptime" class="" value="<?=$appointment_time;?>" required/><br>
        <label class="inf">Appointment STATUS : </label><br>
        <select class="infg" name="appstatus" value="<?=$appointment_status;?>">
            <option value="PENDING">PENDING</option>
            <option value="ACCEPTED">ACCEPTED</option>
            <option value="REJECTED">REJECTED</option>
        </select><br>
        <br>
        <input class="empasa" type="submit" name="editappointment" value="Submit"/>
       
    </form>
</div>