<?php
//  Function to check if user is logged in
function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}
//  Function to check if admin is logged in
function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

// Function to logout user
function logout()
{
    if (isset($_GET['logout']) && $_GET['logout'] == true) {
        session_destroy();
        unset($_SESSION['user']);
        header("location: index.php?page=login");
    }
}
logout();

//  Function to displays errors
function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error .'<br>';
        }
        echo '</div>';
    }
}

//  Function to generate random password
function generateRandomPassword($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//  Function to send mail
function phpMailer($msg, $sbj, $email, $alertmessage)
{
    // Load PHP Mailer
    require 'libraries/PHPMailerAutoload.php';
    $mail = new PHPMailer();
            
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host       = 'smtp.mailtrap.io'; // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = '4ebf7e0e74a69e'; // SMTP username
    $mail->Password   = 'a74b336b5fdc1c'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, ssl also accepted
    $mail->Port       = 2525; // TCP port to connect to
            
    $mail->setFrom('chatbox@lekkerchatten.nl', 'Chatbox Lekker Chatten');
    $mail->addReplyTo('chatbox@lekkerchatten.nl', 'Chatbox Lekker Chatten');
    $mail->addAddress($email); // Add a recipient
    $mail->addCC('chatbox@lekkerchatten.nl'); // Add a CC
    // $mail->addBCC('bcc@example.com'); // Add a BCC
            
    $mail->isHTML(true); // Set email format to HTML
            
    $bodyContent = $msg; // Content in mail
            
    $mail->Subject = $sbj; // Mail subject
    $mail->Body    = $bodyContent;
            
    try {
        $mail->send();
        //Moet session succesfull worden
        echo "<script>alert('$alertmessage' );</script>";
    } catch (Exception $e) {
        //Moet session unsuccesfull worden
        echo "<script type='text/javascript'>alert('Bericht kon niet worden verstuurd');</script>";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}