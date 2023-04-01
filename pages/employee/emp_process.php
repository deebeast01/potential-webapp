<?php
    include 'config/config.php';


    if(isset($_POST['addemp'])){

        $empname = $_POST['empname'];
        $empaddress = $_POST['empaddress'];
        $empcontact = $_POST['empcontact'];
        $empdept = $_POST['empdept'];
        $empuser = $_POST['empuser'];
        $emppass = $_POST['emppass'];

        $sql = "INSERT INTO tbl_employee(emp_name,emp_address,emp_contact,emp_username,emp_password,emp_department)
        VALUES('$empname','$empaddress','$empcontact','$empuser','$emppass','$empdept')";

        $result = mysqli_query($conn,$sql) or die();
  
        if ($result){
            echo ("<script language='javascript'>
       window.location.href='header.php?load=page2'
       </script>");
       }else{
        echo ("<script language='javascript'>
        window.location.href='header.php?load=page2'
        </script>");
       }
  
    }

    
?>
