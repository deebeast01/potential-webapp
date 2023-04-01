<?php
    include 'config/config.php';

    /** GET THE ID FROM DELETE BUTTON AND QUERY TO DELETE */
    if (isset($_GET['delete'])) {
        
        $nid = $_GET['delete'];
        $sql = "DELETE FROM tbl_employee WHERE emp_id = $nid";
        $result = mysqli_query($conn,$sql);

        if ($result){
                 echo ("<script language='javascript'>
            window.alert('Deleted!!!')
            window.location.href='header.php?load=page2'
            </script>");
            }
    }

    /** GET DATA FROM FORM AND QUERY TO UPDATE THE DATA IN THE DB */
    if(isset($_POST['editemployee'])){

        $eid = $_POST['id'];
        $empname = $_POST['empname'];
        $empaddress = $_POST['empadd'];
        $empcontact = $_POST['empcontact'];
        $empdepartment = $_POST['empdept'];
        $empuser = $_POST['empuser'];
        $emppass = $_POST['emppass'];

        $sql = "UPDATE tbl_employee set  emp_name='$empname',
                                         emp_address='$empaddress',
                                         emp_contact='$empcontact',
                                         emp_username='$empuser',
                                         emp_password='$emppass',
                                         emp_department='$empdepartment' WHERE emp_id = '$eid'
                                         ";
        
        $result = mysqli_query($conn,$sql);

        if($result){
            echo ("<script language='javascript'>
            window.alert('Updated Employee Record!!!')
            window.location.href='header.php?load=page2'
            </script>");
        }else{
            echo ("<script language='javascript'>
            window.alert('INVALID FIELDS!!!')
            window.location.href='header.php?load=page2'
            </script>");
           }
      

    }


    ?>