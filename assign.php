<?php

include('connection.php');
$name=$_POST["name"]; //Get the username
$cafID=$_POST["cafe"];//Get the new cafeID
$sql="UPDATE staff SET cafeID='$cafID' WHERE staffId='$name'"; //update table
if(mysqli_query($con,$sql)){
    header('Location:admin-dashboard.php?success=1');//pass success message
}
else{
    header('Location:admin-dashboard.php?success=0');//pass error message
}
?>