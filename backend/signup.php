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

    $SQL_Query = 'select * from auth_users where email = "' . $email . '" and is_verified = "true"';
    $res = mysqli_query($conn, $SQL_Query);
    $data_1 = mysqli_fetch_assoc($res);

    // If User already have an account
    if ($data_1 > 0) {
        setcookie("verfied", "Verified", time() + 360000);
        //header('location: ../login.php');
      	header('location: ../login.php?confirmed');
        exit();
    }


    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Enable verbose debug output
        $mail->SMTPDebug = 0; // SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        //$mail->Username = 'zinatullahakrami@gmail.com';
         $mail->Username = 'stic.aogc@gmail.com';

        //SMTP password
        //$mail->Password = 'dedgzkrvtmbubgrr';
         $mail->Password = 'ghhz zjfy rwxx rgqy';

        //Enable TLS encryption;
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 465;

        //////////////////////////////////////////////////////////
        //Recipients
        $mail->setFrom('stic.aogc@gmail.com', 'STIC');

        //Add a recipient
        $mail->addAddress($email, $name);
        // echo $email;

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';

        $message = '<!DOCTYPE html>
        <html lang="en">
        
            <head>
                <title>STIC</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <style type="text/css">
                    #outlook a {
                        padding: 0;
                    }
            
                    .ReadMsgBody {
                        width: 100%;
                    }
            
                    .ExternalClass {
                        width: 100%;
                    }
            
                    .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                        line-height: 100%;
                    }
            
                    body,
                    table,
                    td,
                    a {
                        -webkit-text-size-adjust: 100%;
                        -ms-text-size-adjust: 100%;
                    }
            
                    table,
                    td {
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                    }
            
                    img {
                        -ms-interpolation-mode: bicubic;
                    }
            
            
                    body {
                        margin: 0;
                        padding: 0;
                    }
            
                    img {
                        border: 0;
                        height: auto;
                        line-height: 100%;
                        outline: none;
                        text-decoration: none;
                    }
            
                    table {
                        border-collapse: collapse !important;
                    }
            
                    body {
                        height: 100% !important;
                        margin: 0;
                        padding: 0;
                        width: 100% !important;
                    }
            
                    .appleBody a {
                        color: #68440a;
                        text-decoration: none;
                    }
            
                    .appleFooter a {
                        color: #999999;
                        text-decoration: none;
                    }
            
                    @media screen and (max-width: 525px) {
            
                        table[class="wrapper"] {
                            width: 100% !important;
                        }
            
                        td[class="logo"] {
                            text-align: left;
                            padding: 20px 0 20px 0 !important;
                        }
            
                        td[class="logo"] img {
                            margin: 0 auto !important;
                        }
            
                        td[class="mobile-hide"] {
                            display: none;
                        }
            
                        img[class="mobile-hide"] {
                            display: none !important;
                        }
            
                        img[class="img-max"] {
                            max-width: 100% !important;
                            height: auto !important;
                        }
            
                        table[class="responsive-table"] {
                            width: 100% !important;
                        }
            
                        td[class="padding"] {
                            padding: 10px 5% 15px 5% !important;
                        }
            
                        td[class="padding-copy"] {
                            padding: 10px 5% 10px 5% !important;
                            text-align: center;
                        }
            
                        td[class="padding-meta"] {
                            padding: 30px 5% 0px 5% !important;
                            text-align: center;
                        }
            
                        td[class="no-pad"] {
                            padding: 0 0 20px 0 !important;
                        }
            
                        td[class="no-padding"] {
                            padding: 0 !important;
                        }
            
                        td[class="section-padding"] {
                            padding: 50px 15px 50px 15px !important;
                        }
            
                        td[class="section-padding-bottom-image"] {
                            padding: 50px 15px 0 15px !important;
                        }
            
                        td[class="mobile-wrapper"] {
                            padding: 10px 5% 15px 5% !important;
                        }
            
                        table[class="mobile-button-container"] {
                            margin: 0 auto;
                            width: 100% !important;
                        }
            
                        a[class="mobile-button"] {
                            width: 80% !important;
                            padding: 15px !important;
                            border: 0 !important;
                            font-size: 16px !important;
                        }
            
                    }
                </style>
            </head>
            
            <body style="margin: 0; padding: 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                    <tr>
                        <td bgcolor="#ffffff">
                            <div align="center" style="padding: 0px 15px 0px 15px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="wrapper">
                                    <tr>
                                        <td class="logo">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td style="padding: 10px" bgcolor="#ffffff" width="100" align="left">
                                                        <a href="https://stic.aogc.dev" target="_blank">
                                                            <img alt="Logo" src="https://stic.aogc.dev/logo/prof_logo.png"
                                                                width="100" style="display: block;" border="0">
                                                        </a>
                                                    </td>
                                                    <td bgcolor="#ffffff" width="400" align="right" class="mobile-hide">
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td
                                                                    style="padding: 0 0 5px 0; font-size: 17px; font-family: garamond; color: #666666; text-decoration: none;">
                                                                    Building the Nation with Passion
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                    <tr>
                        <td bgcolor="#f8f8f8" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">
                            <table border="0" cellpadding="0" cellspacing="0" width="500" style="padding:0 0 20px 0;"
                                class="responsive-table">
                                <tr>
                                    <td style="padding: 0 0 10px 130px; font-size: 25px; font-family: garamond; font-weight: normal; color: #333333; text-align: left;"
                                        class="padding-copy" colspan="2">
                                        STIC
                                        <br />
            
                                        <span style="font-size: 14px; text-align: left !important;">Science,Technology, and
                                            Innovation Commission (STIC)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a
                                            href="https://stic.aogc.dev/" target="_blank"><img
                                                src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/48935/campaign-monitor-logo.jpg"
                                                alt="Campaign Monitor" width="105" height="105" border="0"
                                                style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 105px; height: 105px;"></a>
                                    </td>
                                    <td style="padding: 40px 0 0 0;" class="no-padding">
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td align="left"
                                                    style="padding: 0 0 5px 25px; font-size: 13px; font-family: garamond; font-weight: 700; color: #aaaaaa;"
                                                    class="padding-meta">Dear ' . $name . '.</td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="padding: 0 0 5px 25px; font-size: 20px; font-family: garamond; font-weight: 700; color: #333333;"
                                                    class="padding-copy">Thank you for signing up for our services.</td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="padding: 10px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: garamond; color: #666666; text-align: justify; font-weight: 500;"
                                                    class="padding-copy">We are excited to have you on board, to ensure the security
                                                    and integrity of your account, we kindly request you to verify your email
                                                    address.</td>
                                            </tr>
            
                                            <tr>
                                                <td style="padding:0 0 30px 25px;" align="left" class="padding">
                                                    <table border="0" cellspacing="0" cellpadding="0"
                                                        class="mobile-button-container">
                                                        <tr>
                                                            <td align="center">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                                                    class="mobile-button-container">
                                                                    <tr>
                                                                        <td align="center" style="padding: 0;" class="padding-copy">
                                                                            <table border="0" cellspacing="0" cellpadding="0"
                                                                                class="responsive-table">
                                <tr>
                                    <td align="center">
                                        <a href="https://stic.aogc.dev/mail/verification.php?mail=' . $email . '&otp=' . $verification_code . '"
                                            target="_blank"
                                            style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #4FC1E9; border-top: 10px solid #4FC1E9; border-bottom: 10px solid #4FC1E9; border-left: 20px solid #4FC1E9; border-right: 20px solid #4FC1E9; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; display: inline-block; margin-top: 15px;"
                                            class="mobile-button">Verify account
                                            &rarr;
                                        </a>
                                    </td>
                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="padding: 0px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: garamond; color: #666666; text-align: justify;"
                                                    class="padding-copy">By confirming your email address, you will gain full access
                                                    to our platform and receive important updates and notifications regarding your
                                                    account. If you did not sign up for our services, please ignore this email.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td style="padding: 20px 0px 20px 0px;">
                                        <table width="500" border="0" cellspacing="0" cellpadding="0" align="center"
                                            class="responsive-table">
                                            <tr>
                                                <td align="center" valign="middle"
                                                    style="font-size: 12px; line-height: 18px; font-family: garamond; color:#666666;">
                                                    <span class="appleFooter" style="color:#666666;">
                                                        17th District, Sar-Kotal Khair khana, Kabul, Afghanistan
                                                    </span>
                                                    <br>
                                                    <a class="original-only"
                                                        style="color: #666666; text-decoration: none;">Unsubscribe
                                                    </a>
                                                    <span class="original-only"
                                                        style="font-family: garamond; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <a href="https://stic.aogc.dev" style="color: #666666; text-decoration: none;">STIC
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        
        </html>';


        $mail->Body    = $message;

        $mail->send();

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);




        $pre_registeration = 'select * from auth_users where email = "' . $email . '"';
        $pre_res = mysqli_query($conn, $pre_registeration);
        $almost_data = mysqli_fetch_all($pre_res);

        // echo $almost_data ;


        if (count($almost_data) > 0) {
            $update_query = "UPDATE auth_users SET verification_code=$verification_code WHERE email = '" . $email . "'";
            mysqli_query($conn, $update_query);
            header("Location: ../verification.php");
            exit();
        } else {
            $sql = "INSERT INTO auth_users(name, email, password, verification_code, is_verified) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', 'NULL')";
            mysqli_query($conn, $sql);
            header("Location: ../verification.php");
            exit();
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
