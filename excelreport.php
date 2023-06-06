<?php
     include "config/config.php"; 

     //Custom function to filter the excel data
     function filterData(&$str){
            $str = preg_replace("/\t/","\\t",$str);
            $str = preg_replace("/\r?\n/","\\n",$str);
            if(strstr($str,'"')) $str = '"' . str_replace('"', '""',$str) . '"';
     }

     //Excel filename for download
     $fileName = "Red Shield Appointment Report" . date('Y-m-d') . ".xls";

     //Column Names
     $fields = array('Patient Name','Patient Address','Appointment Type','Appointment Date');

     //Display column names as first row
     $excelData = implode("\t", array_values($fields)) . "\n" ; 

     //fetch records from DB
     $query = $conn->query("SELECT * FROM tbl_appointment");
     if($query->num_rows > 0){
        //Output each row of data
        while($row = $query->fetch_assoc()){
            $lineData = array($row['patient_name'],$row['patient_address'],$row['appointment_type'],$row['appointment_date']);
            array_walk($lineData, 'filterData');
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }
     }else{
        $excelData .= 'No records found ... ' . "\n"; 
     }

     // Headers for download
     header("Content-type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename =\"$fileName\"");

     //Render excel data
     echo $excelData;

     exit;
?>