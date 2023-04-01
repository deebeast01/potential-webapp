<?php
    include 'config/config.php';
?>
<style>
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
    .employees-container{
        width:100%;
        height:800px;
        background-color:white;
    }
    .upper{
        margin-top:2%;
        width:100%;
        height:10%;
        
    }
    .upper-left{
        width:75%;
        height:100%;
        float:left;
        
    }
    .upper-right{
        width:24.5%;
        height:102%;
        float:right;
       
    }
    .ha{
        color:red;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .inf{
        font-family:Calibri;
        font-size:25px;
    }
    .infg{
        width:100%;
        height:5%;
        border-radius:12px;
    }
    .empasa{
        margin-bottom:2%;
        width:100%;
        height:5%;
        border-radius:12px;
        background-color:red;
        color:white;
    }
    .empasa:hover{
        cursor:pointer;
        box-shadow:0 0 10px gray;
    }
</style>
<div class="employees-container">
    <div class="upper">
        <div class="upper-left">
            <h1 class= "ha"> Manage Employees </h1>
        </div>
        <div class="upper-right">
            <br>
        <button class="add" id="myBtn">Add Employee </button><br><br>
            <form action = "" method="post">
            <input class ="field_rsearch" style="float:left;"  type="text" placeholder="Search.." name = "rsearch">
            <input class ="btnfield_rsearch" style="float:right;"type="submit" name = "search" value="Search"></form>
        </div>
    </div>
    <div class="lower">
    <?php
            function filterTable($query){
                require('config/config.php');
                    $filter_Result = mysqli_query($conn,$query);
                    return $filter_Result;
                }           
            if(isset($_POST['search'])){
                $valueToSearch = $_POST['rsearch'];
                $query = "SELECT * FROM `tbl_employee` WHERE CONCAT(`emp_name`, `emp_address`, `emp_contact`, `emp_department`) LIKE '%".$valueToSearch."%';";
                $result = filterTable($query);
            } else {
            $sql = "SELECT * FROM tbl_employee";
            $result = $conn->query($sql);
            }
        ?>
        <br><br>
            <table id="table">
                        <tr>
                                <th>Employee Name</th>
                                <th>Employee Address</th>
                                <th>Employee Contact</th>
                                <th>Employee Department</th>
                                <th></th>
                                <th></th>
                        </tr>
                    <?php
                        if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){ ?>
                                <tr>
                                     <td><?= $row["emp_name"];?></td>
                                     <td><?= $row["emp_address"];?></td>
                                     <td><?= $row["emp_contact"];?></td>
                                     <td><?= $row["emp_department"];?></td>
                                     <td><button class="edit" onClick="document.location.href='edit_employee.php?edit=<?=$row['emp_id']?>'">Edit</button></td>
                                <td><button class="delete" onClick="document.location.href='delete_employee.php?delete=<?=$row['emp_id']?>'">Delete</button></td>
                                </tr>

                        <?php
                            }
                        }
                    ?>
            </table>
    </div>
</div>

<div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                <H1> ADD EMPLOYEE </H1>
    <form action="header.php?load=page5" method="POST">
        <label class="inf">Employee Name : </label><br>
        <input class="infg" type="text" name="empname"/> <br>
        <label class="inf">Employee Address : </label><br>
        <input class="infg"type="text" name="empaddress"/><br>
        <label class="inf">Employee Contact # : </label><br>
        <input class="infg" type="text" name="empcontact"/><br>
        <label class="inf">Designated Department : </label><br>
        <select class="infg" name="empdept">
            <option value="Receptionist">Receptionist</option>
            <option value="Security">Security</option>
            <option value="Technician">Technician</option>
            <option value="Sales">Office Sales Person</option>
            <option value="Doctor">Doctor</option>
        </select><br>
        <label class="inf">Employee Username : </label><br>
        <input class="infg"type="text" name="empuser" required/><br>
        <label class="inf">Employee Password : </label><br>
        <input class="infg" type="password" name="emppass" required/><br>
            <br>
        <input class="empasa" type="submit" name="addemp" value="Add"/>
    </form>

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
