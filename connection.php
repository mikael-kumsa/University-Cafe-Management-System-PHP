<?php
    //   if(!isset($_SERVER['HTTP_REFERER'])){
    //  header('location:index.php');
    //     exit;
    
    // }
    $host = "localhost";
    $user = "astucms";
    $password = "astucms";
    $db_name = "astu-cafems";
    $con = mysqli_connect($host, $user,$password,$db_name);
    if(mysqli_connect_errno()){
        die("ይቅርታ! ከ ዳታቤዝ ጋር ማገናኘት አልተቻለም!".mysqli_connect_error());
    }
?>