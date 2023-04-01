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
        <button class="btn"><a href="appointment/appointment.php">SET APPOINTMENT</button>
        <button class="btn"><a href="services/services.php">AVAILABLE SERVICES</button>
        </div>
        <div class="container-content-right">
             <img src="uploads/map.jpg" alt="logo" width="100%" height="100%">
        </div>
        
    </div>

</div>
