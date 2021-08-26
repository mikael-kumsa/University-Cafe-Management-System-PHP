<?php
    ob_start();
    session_start();
  
?>

<?php
    include('./connection.php');  #include our connection configuration file.
    if ( !isset($_POST['username'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }
    $username = $_POST['username'];
    $password = $_POST['password'];    #declare variables to hold user name and password
    // the next code prevents mysqli injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con,$username);
    $password = mysqli_real_escape_string($con,$password);
    $_SESSION['current_user']=$username;
    $sql = "select * from staff where staffId = '$username' and pass = '$password'"; //select matching data
    $result = mysqli_query($con,$sql); //execute query
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); //fetch the data and store it as an array in $row
    $count = mysqli_num_rows($result); //get the number of rows
    if($count == 1 && $row['privilege'] == 'Admin'){ // if there is a match (the username and password is correct)
        header('Location: admin-dashboard.php'); // redirect to admin-dashboard.php
    }
    elseif($count == 1 && $row['privilege'] == 'Normal'){
        $tempCafeId = fopen("tempCafeID.txt", "w");//open file
        $cafe_ID = $row['cafeID'];// store cafeID of the staff on to $cafe_ID
        fwrite($tempCafeId,$cafe_ID); // write the data on the file
        fclose($tempCafeId);// close the file
        header('Location: dashboard.php'); // redirect to dashboard.php
    }
    else{
        header('Location: index.php?error=1'); // redirect to index.php and trigger the error message
    }
?>