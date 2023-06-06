<h1>EDIT EMPLOYEE DETAILS</h1>
<?php

use LDAP\Result;

    include 'config/config.php';

    $emp_name='';
    $emp_address='';
    $emp_contact='';
    $emp_username='';
    $emp_password='';
    $emp_department='';

    /** GET DATA FROM EDIT FORM ,COMPARE TO DB AND DISPLAY BACK INTO THE FORM FOR EDIT */
    if(isset($_GET['edit'])){

        $eid =$_GET['edit'];
        $sql = "SELECT * FROM tbl_employee WHERE emp_id =$eid";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            $eid =$row['emp_id'];
            $emp_name=$row['emp_name'];
            $emp_address=$row['emp_address'];
            $emp_contact=$row['emp_contact'];
            $emp_username=$row['emp_username'];
            $emp_password=$row['emp_password'];
            $emp_department=$row['emp_department'];
        }
    }
?>

<style>
    h1{
        Color:Red;
        text-align:center;
        margin-top:10%;
    }
    .editemployeeform{
        width:500px;
        height:500px;
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
    <form action="delete_employee.php" method="POST">
        <input type="hidden" name="id" value="<?=$eid;?>">   
        <label class="inf">Employee Name : </label><br>
        <input class="infg" type="text" name="empname" value="<?=$emp_name;?>"><br>
        <label class="inf">Employee Address : </label><br>
        <input class="infg" type="text" name="empadd" value="<?=$emp_address;?>"><br>
        <label class="inf">Employee Contact  : </label><br>
        <input class="infg" type="text" name="empcontact" value="<?=$emp_contact;?>"><br>
        <label class="inf">Employee Department  : </label><br>
        <select class="infg" name="empdept" value="<?=$emp_department;?>">
            <option value="RECEPTIONIST">Receptionist</option>
            <option value="SECURITY">Medtech</option>
            <option value="TECHNICIAN">Radtech</option>
            <option value="DOCTOR">Doctor</option>
        </select><br>
        <label class="inf">Employee Username  : </label><br>
        <input class="infg" type="text" name="empuser" value="<?=$emp_username;?>"><br>
        <label class="inf">Employee Password  : </label><br>
        <input class="infg" type="password" name="emppass" value="<?=$emp_password;?>"><br>
        <br>
        <br>
        <input class="empasa" type="submit" name="editemployee" value="Submit"/>
        <button class="empasa"><a href="header.php?load=page2">Back</a></button>
    </form>
</div>
