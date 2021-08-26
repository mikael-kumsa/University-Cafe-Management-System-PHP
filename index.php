<?php
include('connection.php');
?>
<!-- Html Start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASTU | Cafeteria Managment System</title>
    <link rel="stylesheet" type="text/css" href="./Assets/css/w3.css">
    <link rel="stylesheet" type="text/css" href="./Assets/css/boot.css">
    <link rel="stylesheet" href="./Assets/fonts/fontawesome/css/all.css">
    <script src="./Assets/js/main.js"></script>
</head>
<body>
<div class="w3-container w3-teal topp">
  <h1>ASTU - Cafeteria Management System</h1>
</div>
<div class="w3-container">
</div>
<div class="w3-row">
  <div class="w3-col" style="width:27%"><p></p></div>
  <div class="w3-col" style="width:40%"><p></p>
  <form action="auth.php" method="post">
    <div class="imgcontainer">
      <h2>Login</h2>
    </div>
    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="un" required>
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" minlength="5" name="password" required>
      <button type="submit">Login</button>
    </div>
    <?php
    if ( isset($_GET['in_error']) && $_GET['in_error'] == 1 )
    {?>
      <div class='w3-panel w3-red w3-animate-opacity w3-display-container'>
        <span onclick="this.parentElement.style.display='none'" class='w3-button w3-large w3-display-topright'>&times</span>
        <h5>Username must contain atleast 2 forward slashes (/)</h5>
      </div>
      <?php
      header( "refresh:2;url=index.php" );
      }?>
      <?php
      if ( isset($_GET['error']) && $_GET['error'] == 1 )
      {?>
      <div class='w3-panel w3-red w3-animate-opacity w3-display-container'>
        <span onclick="this.parentElement.style.display='none'" class='w3-button w3-large w3-display-topright'>&times</span>
        <h5>Invalid Credential | የተሳሳተ የይለፍ ቃል ወይም ስም!<br>Please try again | እባክዎ እንደገና ይሞክሩ!</h5>
        </div><?php
        header( "refresh:1;url=index.php" );
        }?>
        <?php
        if ( isset($_GET['sent']) && $_GET['sent'] == 1 )
        {?>
      <div class='w3-panel w3-green w3-animate-opacity w3-display-container'>
        <span onclick="this.parentElement.style.display='none'" class='w3-button w3-large w3-display-topright'>&times</span>
        <h3>Your password has been sent to your email address!<br>Please check your inbox!</h3>
        <p>Click the "X" button to close this Dialog.</p>
      </div>
      <?php
        header( "refresh:1;url=index.php" );
      }?>
      <?php
      if ( isset($_GET['sent']) && $_GET['sent'] == 0 )
      {?>
      <div class='w3-panel w3-red w3-animate-opacity w3-display-container'>
        <span onclick="this.parentElement.style.display='none'" class='w3-button w3-large w3-display-topright'>&times</span>
        <h4>Something Went wrong...<br> please check your email and username and try again!<br></h4>
        <p>Click the "X" button to close this Dialog.</p>
      </div>
      <?php
        header( "refresh:1;url=index.php" );
        }?>
        <div class="container" style="background-color:#f1f1f1">
          <span class="psw"><a href="#" onclick="document.getElementById('id01').style.display='block'">Forgot password?</a></span>
        </div>
      </form>
    </div>
    <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
      <div class="w3-center">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>
      <form class="w3-container" action="resendPass.php" method="post">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" id="userID" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border" type="email" placeholder="Enter Email" name="email" id="email" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="submit" >Reset</button>
        </div>
      </form>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <span class="w3-right w3-padding w3-hide-small">The password will be sent to the email address you provided! Please check your inbox!</a></span>
      </div>
    </div>
  </div>
  <div class="w3-col" style="width:35%"><p></p></div>
</div>
</body>
</html>

