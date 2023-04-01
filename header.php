<?php
include"config/config.php";

/* TRIGGER OF SESSION -- SET THE GET FUNCTION WITH 'load'  */
session_start();
    $page = (isset($_GET['load']) && $_GET['load'] != '') ? $_GET['load'] : '';
	
	
?>

<style>
    body{
        background-color:white;
    }
    .main-container{
        width:100%;
        height:1024px;
        
    }
    .logo{
        background-image: url("uploads/wiw.jpg");
        background-size:cover;
    }
    .upper-nav{
        width:100%;
        height:200px;
        background-color:red;
        color:white;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .upper-nav-left{
        width:30%;
        height:100%;
       
        float:left;
    }
    .upper-nav-right{
        width:69.6%;
        height:100%;
        
        float:right
    }
    .upper-upper-nav-right{
        width:100%;
        height:50%;
        
    }
    .lower-upper-nav-right{
        
        
        width:100%;
        height:50%;
        
    }
    .logout{
        color:red;
        border:none;
        margin-right:25px;
        Background-color:white;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        border-radius:25px;
        width:100%;
        height:100%;
    }
    .logout:hover{
        cursor:pointer;
        background-color:orange;
        color:white;
    }

    li{
        float:left;
        display:inline;
    }
    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    li a:hover {
         background-color:white;
         color:red;
    }
    .nav{
        width:100%;
        height:80%;
        
    }
    .wow{
        float:left;
        width:96%;
        height:58%;
        list-style-type: none;

        overflow: hidden;
        background-color: red;
        font-size:30px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    #table {
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#table td, #table th {
  border: 1px solid #ddd;
  padding: 8px;
}
#table tr:nth-child(even){background-color: #f2f2f2;}
#table tr:hover {background-color: #ddd;}
#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ff0000;
  color: white;
}
.field_rsearch{
    width: 80%;
    height: 30%;
    border:none;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.btnfield_rsearch{
    border:none;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    height: 30%;
    background-color: #ff0000;
    color:white;
}
.add{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-top:2%;
    width:100%;
    height: 40%;
    margin-right:2%;
    border:none;

}
.footer{
    width:100%;
    height:250px;
    background-color:red;
}

</style>


<html>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

   <div class="main-container">
        <div class="upper-nav">
          <div class="upper-nav-left">
                <div class="logo">
                    <img src="uploads/wiw.jpg" alt="logo" width="100%" height="100%"> 
                </div>
          </div>
          <div class="upper-nav-right">
            <div class="upper-upper-nav-right">
                 <h1 style="float:right;margin-right:5%;"> Welcome,  <?= $_SESSION['role'];?> </h1>
                
            </div>
            
           <div class="lower-upper-nav-right">
                <?php

                /** IF THE LOGIN PAGE GETS THE DATA FROM DB AND MATCHES AS ADMIN .. */
                    if($_SESSION['role'] == "Administrator"){ ?>
                            <div class="nav">     
                                <ul class="wow">
                                    <li><a href="header.php?load=page1">Dashboard</a></li>
                                    <li><a href="header.php?load=page2">Employees</a></li>
                                    <li><a href="header.php?load=page3">Appointments</a></li>
                                    <li style="float:right;"><button class="logout" onClick="document.location.href='logout.php'">LOGOUT</button>
                                </ul>
                               
                            </div> 
                 <?php  
                     /** IF THE LOGIN PAGE GETS THE DATA FROM DB AND MATCHES AS EMPLOYEE .. */
                } else if(isset($_SESSION['emp'])){ ?>
                            <div class="nav">     
                                <ul class="wow">  
                                    <li><a href="header.php?load=page3">Appointments</a></li>
                                    <li style="float:right;"><button class="logout" onClick="document.location.href='logout.php'">LOGOUT</button>
                                </ul>
                               
                            </div> 

                    <?php
                 }
                ?>
        
           </div>
           
          </div>
        </div>
        <!-- SWITCH CASE FOR EASY NAVIGATION..  -->
        <div class="main-content">
            <?php
                    switch($page){
                        case 'page1' : require_once 'pages/admin/homepage.php';
                        break;

                        case 'page2' : require_once 'pages/employee/employees.php';
                        break;

                        case 'page3' : require_once 'pages/appointments/appointments.php';
                        break;

                        case 'page5' : require_once 'pages/employee/emp_process.php';
                        break;

                        case 'page6' : require_once 'pages/employee/homepage.php';
                        break;

                        case 'page7' : require_once 'pages/employee/profile.php';
                        break;
                    }
            ?>
        </div>
   </div>
   <div class="footer">

   </div>
    
</html>