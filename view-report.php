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

<?php 
$sql = "select * from reports";
$results = $con->query($sql);?>
<body>
    <!-- Sidebar -->
<div class="w3-sidebar sb w3-bar-block" style="width:20%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="dashboard.php" class="w3-bar-item w3-button itm"><i class="fas fa-home"> Home </i></a>
  <a href="#" class="w3-bar-item w3-button itm"><i class="fas fa-file-alt"> View Report </i></a>
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
    <h1>Report</h1>
  </header>
<div class="w3-container dash-cont">
  <div class="w3-container w3-text-black">
    <h2>Report List</h2>
    <table class="w3-table w3-striped">
      <tr>
        <th>File Name</th>
        <th>Date</th>
        <th>View</th>
      </tr>
      <?php 
        if ($results->num_rows > 0) {
      // output data of each row
          while($row = $results->fetch_assoc()) {
            echo "<tr>";
            echo  "<td>$row[FileName]</td>" ;
            echo  "<td>$row[Date]</td>" ;
            echo  "<td><a class='btnn' href='./Reports/$row[FileName]'> Open </a></td>" ;
            echo "</tr>";
          }
      } else {
            echo "<tr>";
            echo  "<td>No Data</td>" ;
            echo "</tr>";
          }
          ?>
          </table>
        </div>
    </div>
  </div>
  </div>
</div>
</body>
</html>