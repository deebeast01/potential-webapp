<?php
   /* session_start();
    if(!isset($_SESSION['role'])) {
        header("location: login.php");
    } else {
        header("location:login.php");
        include('../../header.php');
    }*/

    
?>  
<style>
    body{
        background-color:white;
    }
    #main-container{
        width:100%;
        height:800px;
        background-color:white;
         
        
    }
    .container-upper{
        width: 100%;
        height:15%;
      
        background-color:red;
    }
    .container-content{
      
       
    }
    .container-content-left{
        
        margin-top:3%;
        width:40%;
        height:72%;
       
        float:left;
    }
    .container-content-right{
        width:59%;
        height:90%;
        
        float:right;
        margin-top:3%;
    }
    
    .title-container{
        margin-left:40%;
        margin-top:2%;
        width:40%;
        height:25%;
        border:1px solid black;
    }
    .logo-container{
        margin-left:39%;    
        width:25%;
        height:100%;
        float:left;
    }
    .btn{
        width:60%;
        height:15%;
        margin-left:20%;
        margin-top:15%;
        background-color:red;
        border:none;
        border-radius:12px;
        color:white;
        font-size:25px;
        font-family:Arial;

    }
    .btn:hover{
        cursor:pointer;
        box-shadow:0 0 10px gray;

    }
    a:link { text-decoration: none; }
    a{
        color:white;
        font-size:25px;
        font-family:Arial;
        
    }
    .upperland{
        text-align:center;
    }
    .appointmentformcontainer{
        width:100%;
        height:100%;
        
    }
    .formcontainer{
        width:100%;
        height:100%;
        margin-top:15%;
    }
    .inp{
        font-size:20px;
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
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
background-color: white;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 35%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
text-decoration: none;
cursor: pointer;
} 
</style>


<div id="main-container">
    <div class="container-upper">
        <div class="logo-container">
          <img src="uploads/wiw.jpg" alt="logo" width="100%" height="100%"> 
        </div>
        
    </div> 
    <div class="container-content">
        <div class="container-content-left">
        <button class="btn"><a href="login.php">LOG-IN</a></button>
        <button class="btn" id="myBtn">SET APPOINTMENT</button>
        <button class="btn"><a href="services/services.php">AVAILABLE SERVICES</a></button>
        </div>
        <div class="container-content-right">
             <img src="uploads/map.jpg" alt="logo" width="100%" height="100%">
        </div>
        
    </div>

</div>

<div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
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
    
</form>
</div>
</div>

                </div>
               <div class="modal-footer">

               </div>
            </div>

    </div>

    <script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
  modal.style.display = "none";
  }
} 
</script>
