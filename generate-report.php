<?php
  if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:index.php');
    exit;
}
require('fpdf/fpdf.php');
include('connection.php');
$sql = "select * from student WHERE NOT mealPerDay=0";
$results = $con->query($sql);
// $row = $results->fetch_assoc();

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('./Assets/images/profile_pics/p5.png',10,6,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(40);
    // Title
    $this->Cell(120,15,'Astu - Cafe Management System - Daily Report',0,0,'C');
    // Line break
    $this->Ln(30);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

// Instanciation of inherited class
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->FancyTable($header,$data);
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,'ID',1);
$pdf->Cell(50,10,'Name',1);
$pdf->Cell(25,10,'No of Meals',1);
$pdf->Cell(25,10,'Cafe No.',1);
$pdf->Cell(60,10,'Remark',1);

if ($results->num_rows > 0) {
    // output data of each row
    $countMeal=0;
    $countStud=0;
    while($row = $results->fetch_assoc()) {
        $pdf->Ln();
        $pdf->Cell(30,10,$row['studID'],1);
        $pdf->Cell(50,10,$row['firstName'].'    '.$row['lastName'],1);
        $pdf->Cell(25,10,$row['mealPerDay'],1);
        $pdf->Cell(25,10,$row['cafeID'],1);
        $pdf->Cell(60,10,'None',1);
        $countMeal+=$row['mealPerDay'];
        $countStud ++;
    }
    $pdf->Ln();
    $pdf->Cell(80,10,'Total Number Of Student',1);
    $pdf->Cell(25,10,$countStud,1);
    $pdf->Ln();
    $pdf->Cell(80,10,'Total Number Of Meals Eaten',1);
    $pdf->Cell(25,10,$countMeal,1);
    
  } else {
    $pdf->Ln();
    $pdf->Cell(190,10,'No Records Found!',1,1,'C');
  }


$myDate = date('m-d-Y');
$filename = "Daily_Report-".$myDate.".pdf";

$path = "./Reports/".$filename;
try{
  $pdf->Output($path,'F');
  $sql1 = "insert into reports (FileName, date) VALUES ('$filename', '$myDate')";
  mysqli_query($con,$sql1);
  // echo $myDate;
  Header('Location: dashboard.php?report=1');

}
catch (Exception $e){
  Header('Location: dashboard.php?report=0');
}
?>