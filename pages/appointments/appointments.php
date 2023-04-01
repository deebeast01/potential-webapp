<?php
    include 'config/config.php';
?>
<style>
    .appointments-container{
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
        height:100%;
        float:right;
       
    }
    .ha{
        color:red;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
<div class="appointments-container">
    <div class="upper">
        <div class="upper-left">
            <h1 class="ha"> Manage Appointments </h1>
        </div>
        <div class="upper-right">
           <br><br><br><br>
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
                $query = "SELECT * FROM `tbl_appointment` WHERE CONCAT(`appointment_date`, `appointment_time`, `patient_name`, `patient_birthdate`,`patient_address`,`patient_email`,`patient_contact`,`appointment_type`,`appointment_status`) LIKE '%".$valueToSearch."%';";
                $result = filterTable($query);
            } else {
            $sql = "SELECT * FROM tbl_appointment";
            $result = $conn->query($sql);
            }
        ?>
        <br><br>
            <table id="table">
                        <tr>
                                <th>Patient Name</th>
                                <th>Patient Birthdate</th>
                                <th>Patient Address</th>
                                <th>Patient Contact</th>
                                <th>Patient Email</th>
                                <th>Appointment Type</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Appointment Status</th>
                                <th></th>
                                <th></th>
                        </tr>
                    <?php
                        if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){ ?>
                                <tr>
                                     <td><?= $row["patient_name"];?></td>
                                     <td><?= $row["patient_birthdate"];?></td>
                                     <td><?= $row["patient_address"];?></td>
                                     <td><?= $row["patient_contact"];?></td>
                                     <td><?= $row["patient_email"];?></td>
                                     <td><?= $row["appointment_type"];?></td>
                                     <td><?= $row["appointment_date"];?></td>
                                     <td><?= $row["appointment_time"];?></td>
                                     <td><?= $row["appointment_status"];?></td>
                                     <td><button class="edit" onClick="document.location.href='edit_appointment.php?edit=<?=$row['appointment_id']?>'">Edit</button></td>
                                <td><button class="delete" onClick="document.location.href='delete_appointment.php?delete=<?=$row['appointment_id']?>'">Delete</button></td>
                                </tr>

                        <?php
                            }
                        }
                    ?>
            </table>
    </div>
</div>
