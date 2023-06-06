<?php
    session_start();
    include "config/config.php";

    /* GETTING THE DATA FROM THE FORM(login) */
    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $admin = mysqli_query($conn, "SELECT * from tbl_admin where admin_username = '$username' and admin_password = '$password'");
        $numrow_admin = mysqli_num_rows($admin);

        $employee = mysqli_query($conn, "SELECT * from tbl_employee where emp_username ='$username'");
        $numrow_emp = mysqli_num_rows($employee);


        /* COMPARING THE DATA FROM THE FORM TO THE DB , IF DATA IS MATCHED PROCEED TO HEADER */
        if($numrow_admin > 0)
            {
                while($row = mysqli_fetch_array($admin)){  
                  $_SESSION['role'] = "Administrator";
                  $_SESSION['admin_id'] = $row['admin_id'];
                  $_SESSION['admin_username'] = $row['admin_username'];
                }   
                header('location:header.php?load=page3');
            }   
            
        elseif($numrow_emp > 0)
            {
                while($row = mysqli_fetch_array($employee)){
                    $encpass = $row['emp_password']; //CHECK ENCRYPTED PASSWORD

                        if(md5($password)==$encpass){ //COMPARE ENCRYPTED PASSWORD ON DB
                           
                            $_SESSION['role'] = $row['emp_name'];
                            $_SESSION['emp'] = "Employee";
                            $_SESSION['id'] = $row['emp_id'];
                            $_SESSION['username'] = $row['emp_username'];
                            $_SESSION['contact'] = $row['emp_contact'];
                            header('location:header.php?load=page3');
                        
                        }else{
                            header('location:login.php');
                        }
                }     
               
            }

    }

?>
<style>
    body{
        background-color:#e60000;
    }
     .login-container{
        width: 100%;
        height: 930px;
    }
    .login-right{
        width: 100%;
        height: 100%;
        float:right;
        background-color: red;
    }
   
    .text_field{
        font-size:20px;
        color:white;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .input_field{
        border: 1px solid gray;
        width: 50%;
        height: 10%;
    }
    form{
    height: 630px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #006633;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
    color:white;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color:white;
    border-radius: 3px solid black;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: black;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: red;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
}
button:hover{
    background-color: orange;
    color:white;
    cursor:pointer;
    box-shadow: 0 0 10px white;
}
a:link { text-decoration: none; }
</style>

<html>
    <head>
        <title>Red Shield Laboratory</title>

        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="cache-control" content="no-cache" />
    </head>
    <body>
        <div class="login-container">

                <div class="login-right">
                    
                <div class = "mainTitle"><h1 class="title"></h1></div>
                    <div class ="adminLogin">
                            <div class ="loginLogo"></div>

            <form method="POST">
                <h3>Red Shield Clinical Laboratory</h3>

                <label class ="text_field">Username  </label>
                <input type="text" placeholder="Username" name="username"required/> <br><br>

                <label class ="text_field">Password  </label>
                <input type="password" placeholder="Password" name="password"required/><br><br>

                <button name="login">Log In</button>
                <button name="register" class="register"><a href="index.php">Home</a></button>
            </form>
                        </div>
                </div>

        </div>
    </body>
</html>
