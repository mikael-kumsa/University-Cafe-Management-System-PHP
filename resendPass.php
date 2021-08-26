<?php
//   if(!isset($_SERVER['HTTP_REFERER'])){
//     header('location:index.php');
//     exit;
// }
    include('connection.php');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $sql = "select * from staff where staffId = '$username'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if($row['staffId'] == $username){

    //Server settings
    $mail->SMTPDebug = 0;  //Enable verbose debug output
    $mail->isSMTP();         //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'youremail@address.com';                     //SMTP username
    $mail->Password   = 'yourpassword';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('youremail@address.com');
    $mail->addAddress($email);  //Add a recipient
    $mail->isHTML(true);   //Set email format to HTML
    $mail->Subject = 'Reset Password';
    $mail->Body    = 'Dear! Your password is <i>astu123</i> ';
   
    $mail->send();
    Header('Location:index.php?sent=1');

}else {
    Header('Location:index.php?sent=0');
}


?>
