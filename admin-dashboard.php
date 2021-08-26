<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  
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
    <script src="./Assets/js/main.js"></script>
</head>
<body>

<!--===== Sidebar =====-->
<div class="w3-sidebar sb w3-bar-block" style="width:20%">
  <h3 class="w3-bar-item"></h3>
  <a href="admin-dashboard.php" class="w3-bar-item w3-button itm"><i class="fas fa-home"> Home </i></a>
    <!-- when this is clicked the modal will open -->
  <a href="#" onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button itm"><i class="fas fa-user-plus"> Manage Staff </i></a>
  <a href="view-report.php" class="w3-bar-item w3-button itm"><i class="fas fa-file-alt"> View Report </i></a>
  <a href="index.php" class="w3-bar-item w3-button itm"><i class="fas fa-home"> Log Out </i></a>
</div>
<!-- =================== -->
<!-- Page Content -->
<div style="margin-left:20%">
<!-- Header -->
<div class="w3-container w3-teal">
  <h1>ASTU - Cafe Management System</h1>
</div> 
<!-- ==================== -->
<div class="w3-panel w3-blue w3-round-xlarge pnl">
<div class="w3-card-4" style="width:90%;">
    <header class="w3-container w3-blue">
      <h1>Dashboard</h1>
    </header>
    <div class="w3-container dash-cont">
<!-- Success message if assigned -->
<div class="w3-row">
  <div class="w3-container w3-half">
    <div class="w3-container w3-center">
      <p>&nbsp; </p>
      <img src="./Assets/images/team.svg" width="75" height="200" alt="Avatar" style="width:80%">
      <h5>&nbsp;</h5>
      <div class="w3-section">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green">Manage Staff</button> <!-- when this is clicked the modal will open -->
      </div>
    </div>
  </div>
  <div class="w3-container w3-half">
    <div class="w3-container w3-center">
      <p>&nbsp;</p>
      <img src="./Assets/images/pie-chart.svg" width="75" height="200" alt="Avatar" style="width:80%">
      <h5>&nbsp;</h5>
      <div class="w3-section">
        <button onclick="window.location.href='./view-report.php';" class="w3-button w3-green">View Report</button>
      </div>
    </div>
  </div>
</div>
<?php
if ( isset($_GET['success']) && $_GET['success'] == 1 ) //Display success message if assigning was success
{?>
 
<div class='w3-panel w3-green w3-animate-opacity w3-display-container'>
  <span onclick="this.parentElement.style.display='none'" class='w3-button w3-large w3-display-topright'>&times</span>
  <h3>Successfuly assigned staffs to cafe!</h3>
  <p>Click the "X" button to close this Dialog.</p>
  </div><?php
}
  // Header('refresh:1;url=admin-dashboard.php');
?>
<!-- modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-card-4">
    <header class="w3-container w3-teal"> 
    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
    <h2 class="mod-title">Assign Staff to Cafe</h2>
    </header>
    <div class="w3-row">
      <div class="w3-container w3-half">
        <!-- form -->
        <form class="assign" action="assign.php" method="POST">
          <select class="w3-select staff-select" name="name" >
            <option value="" disabled selected>Staff Memebers</option>
            <?php 
            $sql = "select * from staff WHERE privilege='normal'"; // select normal staff users
            $results = $con->query($sql); 
            if ($results->num_rows>0){
              while($row = $results->fetch_assoc()){
                echo '<option name="stname" value="'.$row['staffId'].'">'.$row['firstName'].' '.$row['lastName'].'</option>';
              }
            }
            echo '</select>';
            ?>
            </div>
            <div class="w3-container w3-half">
              <select class="w3-select cafe-select" name="cafe">
                <option value="" disabled selected>Cafe</option>
                <option value="Cafe4">Cafe 4</option>
                <option value="Cafe5">Cafe 5</option>
              </select>
              <button type="submit" name="assign" class="assign-btn w3-button w3-teal w3-ripple">Assign</button>
            </form>
          </div>
        </div>
        <footer class="w3-container w3-teal">
          <p>Section - 8 - Technologies</p>
        </footer>
      </div>
    </div>
<!-- end of modal -->
</div>
</div>
</div>
</div>
</body>
</html>