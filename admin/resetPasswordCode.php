<?php

session_start();

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "quadex";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


function send_code($username, $email, $resetCode){

    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "apjofficial.01@gmail.com";
    $mail->Password   = "fizbrxlufxbojwsd";

    $mail->SMTPSecure = "tls";
    $mail->Port       = "587";

    
    $mail->setFrom("apjofficial.01@gmail.com", "Practice");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Password Reset Code";

    $email_template = "
    <h2> Dear $username,</h2>
    <h5>You have requested to reset your password. Here is your reset Code:</h5>
    <br>
    <label><b>".$resetCode."</b></label>
    <br>
    
    ";
    
    $mail->Body = $email_template;
    $mail->send();
}

$conn = new mysqli($host, $dbusername, $dbpassword, $database);


if (isset($_POST['sendbtn'])) {

    $email = $_POST['email'];
    $resetCode = rand(1,99999);

    $check_email = "SELECT `ad_email` FROM `admin` WHERE `ad_email` = '$email'";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $insert_code = "UPDATE `admin` SET `reset_code`='$resetCode' WHERE `ad_email` = '$email'";
        $insert_code_run = mysqli_query($conn, $insert_code);

        $get_data = "SELECT * FROM `admin` WHERE `ad_email` = '$email'";
        $get_data_run = mysqli_query($conn, $get_data);

        if ($row = mysqli_fetch_array($get_data_run)) {
            $username = $row['Aid'];

            send_code("$username", "$email", "$resetCode");

            $_SESSION['alert'] = "Reset Code Sent!";
            header("Location: code_pass.php");
        }else {
            $_SESSION['alert'] = "Unknown Error Occured!";
            header("Location: change_pass.php");
        }
    }else {
        $_SESSION['alert'] = "Email not Found!";
        header("Location: change_pass.php");

    }


}

if (isset($_POST['sendCode'])) {

    $code = $_POST['resetCode'];

    $check_code = "SELECT `reset_code`, `ad_email` FROM `admin` WHERE `reset_code` = '$code'";
    $check_code_run = mysqli_query($conn, $check_code);
    
    if (mysqli_num_rows($check_code_run) > 0) {
        $row = mysqli_fetch_array($check_code_run);

        $email = $row['ad_email'];
        header("Location: pass_change.php?code=$code&email=$email");
    }else {
        $_SESSION['alert'] = "Invalid Code!";
        header("Location: code_pass.php");
    }
}

if (isset($_POST['change_ps'])) {

    $newPassword = $_POST['new_ps'];
    $confirmPassword = $_POST['c_ps'];
    $email = $_POST['email'];
    $old_code = $_POST['code'];
    $new_code = rand(1,99999);

    if ($newPassword == $confirmPassword) {
        $update_password = "UPDATE `admin` SET `reset_code`='$new_code',`Apass`='$newPassword' WHERE `ad_email`='$email'";
        $update_password_run = mysqli_query($conn, $update_password);

        if ($update_password_run) {
            $_SESSION['alert'] = "Password Changed!";
            header("Location: quadex/index.php");
        }
    }else {
        $_SESSION['alert'] = "Password do not match!";
        header("Location: pass_change.php");
    }
}
?>