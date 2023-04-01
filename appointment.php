<?php
    include '../config/config.php';
?>
<style>
    .upperland{
        text-align:center;
    }
    .appointmentformcontainer{
        width:100%;
        height:92%;
        
    }
    .formcontainer{
        width:35%;
        height:95%;
       
        margin-left:32%;
        margin-top:4%;
    }
    .inp{
        font-size:25px;
        font-family:Calibri;
    }
    .input{
        width:100%;
        height:5%;
        border-radius:12px;
    }
    .selectinput{
        width:100%;
        height:5%;
        border:none;
    }
    .apporas{
        width:35%;
        height:5%;
    }
    .subbutton{
        width:100%;
        height:7%;
        border:none;
        background-color:red;
        border-radius:12px;
        color:white;
        margin-top:5%;
    }
    .subbutton:hover{
        cursor:pointer;
        box-shadow:0 0 10px gray;
    }
    .title{
        font-size:50px;
        font-family:Calibri;
        color:red;
    }

    a:link { text-decoration: none; }
    a{
        color:white;

    }
    
</style>
<div class="upperland">
<h1 class="title">SET APPOINTMENT</h1>
</div>

<div class="appointmentformcontainer">
    <div class="formcontainer">
<form action="appointment_process.php" method="POST">
    <label class="inp"> Patient's Full Name : </label><br>
    <input class="input" type="text" name="patientname"required/><br>
    <label class="inp">Patient's  Birth Date : </label><br>
    <input class="input" type="date" name="birthdate" placeholder="MM/DD/YYYY"required/><br>
    <label class="inp">Patient's Complete Address: </label><br>
    <input class="input" type="text" name="patientaddress" placeholder="E.g. Street/Barangay/City/Province"required/><br>
    <label class="inp">Patient's Email Address : </label><br>
    <input class="input" type="text" name="patientemail"required/><br>
    <label class="inp">Patient's  Contact # : </label><br>
    <input class="input" type="text" name="patientcontact"required/><br>
    <label class="inp"> Appointment Type : </label><br>
    <select class="selectinput" name="appointmenttype"required>
        <option value="DXRAY">DIGITAL X-RAY</option>
        <option value="CLAB">CLINICAL LABORATORY</option>
        <option value="DRTEST">DRUG TESTING</option>
        <option value="ECG">ELECTROCARDIOGRAPHY</option>
        <option value="AUSCR">AUDIO SCREENING</option>
        <option value="UTSND">ULTRASOUND</option>
        <option value="PPSMR">PAPSMEAR</option>
        <option value="HSCALL">HOUSECALL</option>
    </select><br>
    <br>

    <label class="inp"> Appointment Date and Time: </label><br>
    <input type="date" name="appdate" class="apporas" required/> 
    <input type="time" name="apptime" class="apporas"required/><br>
     <br><label class="">Note | Appointment time should not be past 11:30 AM / 4:30PM</label><br>
    

    <input class ="subbutton" type="submit" name="addappointment" value="Submit"/>
    <button class="subbutton"><a href="../index.php">Go Back<a></button>
</form>
</div>
</div>
