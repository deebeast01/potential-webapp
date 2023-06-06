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
        $emppass = $_POST['emppass']; // START OF ENCRYPTION 
            $ciphering = "AES-128-CBC";
            $iv = openssl_cipher_iv_length($ciphering);
            $options = 0; 
            $encryption_key = "PAWER";
            $encryption_iv = "1234567891011121";
        $enc_pass = openssl_encrypt($emppass,$ciphering,$encryption_key,$options,$encryption_iv); // END OF ENCRYPTION

        $sql = "UPDATE tbl_employee set  emp_name='$empname',
                                         emp_address='$empaddress',
                                         emp_contact='$empcontact',
                                         emp_username='$empuser',
                                         emp_password='$enc_pass',
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
