<?php

session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

// connect with database
$conn = mysqli_connect("localhost:3306", "akrami", "afghan", "sti");

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $user_email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $submit = $_POST['submit'];

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        // $mail->Username = 'zinatullahakrami@gmail.com';
        $mail->Username = 'stic.aogc@gmail.com';

        //SMTP password
        // $mail->Password = 'dedgzkrvtmbubgrr';
        $mail->Password = 'ghhz zjfy rwxx rgqy
';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('stic@aogc.gov.af', 'STIC');

        //Add a recipient
        $mail->addAddress('stic@aogc.gov.af', $name);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = $subject;

        // $email_link = '<h3><a href="localhost/sti/mail/verification.php?mail='.$email.'&otp='.$verification_code.'">Verify</a><h3/>';
        // $email_link = '<h3><a href="https://stic.aogc.dev/mail/verification.php?mail=' . $email . '&otp=' . $verification_code . '">Verify</a><h3/>';
        // echo 'sti.aogc.dev/mail/verification.php?mail='.$email.'&otp='.$verification_code;
        $mail->Body = '<p style="padding: 10px">'.$message.'</p>'.'<br />'.'<h5 style="font-size: 16px; padding-left: 10px">'.$name.'</h5>'.'<h5 style="padding-left: 10px; font-size: 16px;">'.$user_email.'</h5>'.'<p style="font-size: 16px; padding-left: 10px">'.$phone.'</p>';

        $body_name = $name;

        $mail->send();

        // insert in users table
        $sql = "INSERT INTO `contact`( `name`, `email`, `phone`, `subject`, `message`) VALUES ('$name','$user_email','$phone','$subject','$message')";
        
        mysqli_query($conn, $sql);
        header("Location: ../contact.php?thankyou");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
