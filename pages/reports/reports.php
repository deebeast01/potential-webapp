<?php
    include "config/config.php";
    
    
?>
<style>
      h1{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin-left:2%;
        color:red;
    }
    .title{
        padding-top:2%;
        text-align:center;
    }

    .button-pdf-holder{
        width:48%;
        height:40%;
        float:left;
        
        margin-top:7%;
    }
    .button-excel-holder{
        width:48%;
        height:40%;
        margin-top:7%;
        margin-left:2%;
        float:left;
       
    }
    .button-holder-holder{
        width:50%;
        height:20%;
        margin-left:25%;
        margin-top:10%;
    }
    .Butownes{
        width:100%;
        height:100%;
        border:none;
        cursor: pointer;
        background-color:red;
        color:white;
        font-size:20px;
    }
    a{
        text-decoration:none;
        color:white;
}
</style>
<html>

<div class="report-content">
    <div class="button-holder-holder">
            <div class="button-pdf-holder">
                <button class="Butownes"><a href="pdfreport.php" target="_blank" class="">GENERATE PDF REPORT</a></button>
            </div>
            <div class="button-excel-holder">
                <button class="Butownes"><a href="excelreport.php">GENERATE EXCEL FILE REPORT</a></button>
            </div>
    </div>
</div>
</html>