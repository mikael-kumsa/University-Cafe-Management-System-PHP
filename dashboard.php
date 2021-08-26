<?php
  if(!isset($_SERVER['HTTP_REFERER'])){
    
    header('location:index.php');
    exit;

}
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./Assets/css/w3.css">
    <link rel="stylesheet" href="./Assets/css/boot.css">
    <link rel="stylesheet" href="./Assets/fonts/fontawesome/css/all.css">
</head>
<body>
    <!-- Sidebar -->
<div class="w3-sidebar sb w3-bar-block" style="width:20%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="#" class="w3-bar-item w3-button itm"><i class="fas fa-home"> Home </i></a>
  <a href="generate-report.php" class="w3-bar-item w3-button itm"><i class="fas fa-file-alt"> Generate Report </i></a>
  <a href="index.php" class="w3-bar-item w3-button itm"><i class="fas fa-home"> Log Out </i></a>
</div>
<!-- Page Content -->
<div style="margin-left:20%">
<div class="w3-container w3-teal">
  <h1>ASTU - Cafe Management System</h1>
</div>
<div class="w3-panel w3-blue w3-round-xlarge pnl">
<div class="w3-card-4" style="width:90%;">
<header class="w3-container w3-blue">
  <h1>Dashboard</h1>
</header>
<div class="w3-container dash-cont">
  <?php
  include('functions.php');
  $tempCafeIdFile = fopen('tempCafeID.txt','r');
  $staff_cafe_Id = fread($tempCafeIdFile,filesize('tempCafeID.txt'));
  fclose($tempCafeIdFile);
  $studID = 'ugr/17588/11'; // current student
  $sql = "select * from student WHERE studID='$studID'";
  $results = $con->query($sql);
  if ($results->num_rows>0){
    while($row = $results->fetch_assoc()){
      if($row['isInCampus'] == 0){
        display($studID);
        echo  "<div class='w3-panel w3-red w3-border'>
        <h3>The student is Not In Campus!</h3>
        </div>";
        }
      elseif($row['isCafe'] == 0){
        display($studID);
        echo  "<div class='w3-panel w3-pale-red w3-border'>
        <h3>The student is Non-Cafe!</h3>
        </div>";
        }
      elseif($row['cafeID'] != $staff_cafe_Id){
        display($studID);
        echo  "<div class='w3-panel w3-red w3-border'>
        <h3>The student is Not In this cafe!</h3>
        </div>";
        }
      elseif($row['hasEaten'] == 1){
        display($studID);
        echo  "<div class='w3-panel w3-red w3-border'>
        <h3>The student is has already eaten his Meal!</h3>
        </div>";
        }
      else{ display($studID);
        $ml = $row['mealPerDay'];
        if($row['hasEaten'] != 1){
          $ml++;
          $sql2 ="UPDATE student SET hasEaten=true mealPerDay=$ml WHERE studID='$studID'";
          if($con->query($sql2) === TRUE){
          echo  "<h2>Happy Meal!</h2>";
        }
      }
    }
  }
}
?>
<!-- The following code is to display a Success message if the report is generated -->
<?php
  if ( isset($_GET['report']) && $_GET['report'] == 1 )
{?>
     
      <div class='w3-panel w3-green w3-animate-opacity w3-display-container'>
      <span onclick="this.parentElement.style.display='none'" class='w3-button w3-large w3-display-topright'>&times</span>
      <h5>Report Generated Successfully!</h5>
      <p>Click the "X" button to close this Dialog.</p>
      </div><?php
      header( "refresh:2;url=dashboard.php" ); //Refresh the page after 0.5 sec.
}?>
<!-- The following code is to display an error message if the report is not generated -->
<?php
  if ( isset($_GET['report']) && $_GET['report'] == 0 )
{?>
<div class='w3-panel w3-green w3-animate-opacity w3-display-container'>
  <span onclick="this.parentElement.style.display='none'" class='w3-button w3-large w3-display-topright'>&times</span>
  <h5>Something Went Wrong! Please try again!</h5>
  <p>Click the "X" button to close this Dialog.</p>
</div>
<?php
header( "refresh:0.5;url=dashboard.php" );//Refresh the page after 0.5 sec.
}?>
</div>
</div>
</div>
</div>
</body>
</html>