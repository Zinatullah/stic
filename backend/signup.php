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

if (isset($_POST["register"])) {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $SQL_Query = 'select * from auth_users where email = "'. $email.'" and is_verified = "true"';
    $res = mysqli_query($conn, $SQL_Query);
    $data_1 = mysqli_fetch_assoc($res);

    // If User already have an account
    if($data_1 > 0){
        setcookie("verfied", "Verified", time() + 360000);
        header('location: ../mainform.php');
        exit();
    }
    

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
        $mail->Username = 'zinatullahakrami@gmail.com';

        //SMTP password
        $mail->Password = 'dedgzkrvtmbubgrr';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('zinatullahakrami@gmail.com', 'STIC');

        //Add a recipient
        $mail->addAddress($email, $name);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';

        // $email_link = '<h3><a href="localhost/sti/mail/verification.php?mail='.$email.'&otp='.$verification_code.'">Verify</a><h3/>';
        $email_link = '<h3><a href="https://stic.aogc.dev/mail/verification.php?mail='.$email.'&otp='.$verification_code.'">Verify</a><h3/>';
        // echo 'sti.aogc.dev/mail/verification.php?mail='.$email.'&otp='.$verification_code;

        $mail->Body    = '<h4>You have received this Email from sti.aogc.dev. </4><br /><p>Please click the following link to confirm your account' . $email_link . '</p>';

        echo $email_link;

        $mail->send();

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);


        // insert in users table
        $sql = "INSERT INTO auth_users(name, email, password, verification_code, is_verified) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', 'NULL')";
        mysqli_query($conn, $sql);

        // echo ($sql);
        $_SESSION['email_check'] = 'Check your email address please!!!';

        // header("Location: ../verification.php?email=" . $email);
        header("Location: ../verification.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
