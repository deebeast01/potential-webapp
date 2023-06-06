<?php
    include "config/config.php";
    require 'pages/fpdf185/fpdf.php'; //CALLING THE FPDF FILE


    class PDF extends FPDF{
            function Header(){
                $this->setFont('Arial','B',15);
                
                $this->Cell(12);
                $this->Cell(100,10,'REDSHIELD LAB Appointment Reports',0,1);

                $this->Ln(5);

                $this->SetFont('Arial','B',11);
                
                $this->SetFillColor(180,180,255);
                $this->SetDrawColor(50,50,100);
                $this->Cell(40,5,'Patient Name',1,0,'',true);
                $this->Cell(60,5,'Patient Address',1,0,'',true);
                $this->Cell(45,5,'Appointment Type',1,0,'',true);
                $this->Cell(45,5,'Appointment Date',1,1,'',true);   
            }

            function Footer(){
                $this->SetY(-15);
                $this->SetFont('Arial','B',15);

                $this->Cell(0,10,'Page '.$this->PageNo()."/{pages}",0,0,'C');
            }
    }


    $pdf = new PDF('P','mm','A4');

    $pdf->AliasNbPages('{pages}'); //define new alias for total page numbers

    $pdf->AddPage();

    $pdf->SetFont('Arial','',9);    
    $pdf->SetDrawColor(50,50,100);

    $query=mysqli_query($conn,"SELECT patient_name,patient_address,appointment_type,appointment_date FROM tbl_appointment");
    while($data=mysqli_fetch_array($query)){
        $pdf->Cell(40,5,$data['patient_name'],1,0);
        $pdf->Cell(60,5,$data['patient_address'],1,0);
        $pdf->Cell(45,5,$data['appointment_type'],1,0);
        $pdf->Cell(45,5,$data['appointment_date'],1,1); 
    }

    $pdf->Output();
?>