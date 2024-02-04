<?php
$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

if (isset($_POST['submit'])) {

    $email_address = $_COOKIE['loggedIn'];

    $check_query = 'select * from main_form where email = "' . $email_address . '"';
    $check_result = mysqli_query($connection, $check_query);
    $data = mysqli_fetch_all($check_result);


    //  Personal Information section 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $birth_country = $_POST['birth_country'];
    $nationality = $_POST['nationality'];
    $nationality_second = isset($_POST['nationality_second']) ? $_POST['nationality_second'] : '';
    $residential_country = $_POST['residential_country'];
    $district = $_POST['district'];
    $afghan_check = isset($_POST['afghan_check']) ? $_POST['afghan_check'] : 'NULL';
    $volayat = isset($_POST['volayat']) ? $_POST['volayat'] : '';
    $volaswali = isset($_POST['volaswali']) ? $_POST['volaswali'] : '';
    $tazkira = isset($_POST['tazkira']) ? $_POST['tazkira'] : '';

    //  Education section 

    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];
    $university = $_POST['university'];
    $university_country = $_POST['university_country'];
    $profession = $_POST['profession'];
    $experience = $_POST['experience'];
    $job = isset($_POST['job']) ? $_POST['job'] : '';
    $last_employer = isset($_POST['last_employer']) ? $_POST['last_employer'] : '';
    $employement_country = $_POST['employement_country'];
    $area_of_contribution = $_POST['area_of_contribution'];

    //  Relocation 
    $live_in_afg = isset($_POST['live_in_afg']) ?  $_POST['live_in_afg'] : 'NULL';
    $relocation = isset($_POST['relocation']) ?  $_POST['relocation'] : 'NULL';
    $perfered_city = isset($_POST['perfered_city']) ? $_POST['perfered_city'] : '';
    $mode_of_engagement = isset($_POST['mode_of_engagement']) ? $_POST['mode_of_engagement'] : '';
    $period_of_engagement = isset($_POST['period_of_engagement']) ? $_POST['period_of_engagement'] : '';

    //  Proposal content 
    $proposal = isset($_POST['proposal']) ? $_POST['proposal'] : 'NULL';
    $sector = isset($_POST['sector']) ? $_POST['sector'] : 'NULL';
    $start_work = isset($_POST['start_work']) ? $_POST['start_work'] : '';
    $personal_requirements = isset($_POST['personal_requirements']) ? $_POST['personal_requirements'] : '';
    $project_requirements = isset($_POST['project_requirements']) ? $_POST['project_requirements'] : '';


    /////////////////////////// Proposal Upload ////////////////////////////////

    $proposal_attachment = isset($_FILES['proposal_attachment']) ? $_FILES['proposal_attachment'] : 'NULL';
    $proposal_attachment_name = $proposal_attachment['name'];

    if ($proposal_attachment != 'NULL') {

        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($proposal_attachment_name);

        if (move_uploaded_file($_FILES["proposal_attachment"]["tmp_name"], $targetFile)) {
            //echo "File uploaded successfully.";
        }
    }

    /////////////////////////// Proposal Upload End ////////////////////////////////


    //  Contact 
    $phone = $_POST['phone'];
    $email_address = $_POST['email_address'];
    $website_address = $_POST['website_address'];
    $linkedin_page = $_POST['linkedin_page'];
    $reference = isset($_POST['reference']) ?  $_POST['reference'] : '';
    $feedback = isset($_POST['feedback']) ?  $_POST['feedback'] : '';



    ///////////////////////////////////////////// Reference START  /////////////////////////////////////////////

    $reference = isset($_POST['reference']) ? $_POST['reference'] : 'NULL';

    if ($reference == 'yes') {
        $ref_person_name = $_POST['ref_person_name'];
        $ref_relation_with = $_POST['ref_relation_with'];
        $ref_email_address = $_POST['ref_email_address'];
        $ref_phone_number = $_POST['ref_phone'];

        $combinedArray = array_map(null, $ref_person_name, $ref_relation_with, $ref_email_address, $ref_phone_number);
        $resultArray = array_map(function ($item) {
            return array_filter($item);
        }, $combinedArray);

        $logged_in_email_address = $_COOKIE['loggedIn'];


        foreach ($resultArray as $items) {
            $ref_name =  $items[0];
            $ref_relation = $items[1];
            $ref_email_add =  $items[2];
            $ref_phone_number =  $items[3];


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
                $mail->addAddress($ref_email_add, $ref_name);
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
                                <td bgcolor="#f8f8f8" align="center" style="padding: 70px 15px 20px 15px;" class="section-padding">
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
                                                            style="padding: 0 0 5px 25px; font-size: 16px; font-family: garamond; font-weight: 700;"
                                                            class="padding-meta">Dear ' . $ref_name . '.</td>
                                                    </tr>

                                                    <tr>
                                                        <td align="left"
                                                            style="padding: 10px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: garamond; color: #666666; text-align: justify; font-weight: 500;"
                                                            class="padding-copy">

                                                            '. $first_name . ' ' . $last_name .' has recommended you to kindly visit the website of Science, Technology, and Innovation Commission (STIC) Afghanistan and join its Global Talent Database in order to effectively contribute in the national reconstruction of Afghanistan through sharing your innovative ideas and implementing the proposed projects for the sustainable economic and social development of the nation. We warmly welcome you to be a part of this great initiative and an exciting journey ahead.
                                                            <br />
                                                            <br />
                                                            
                                                            Kind regards,
                                                            
                                                            <br />
                                                            <br />
                                                            <a style="color:blue" href="https://stic.aogc.dev" target="_blank">STIC Afghanistan</a>
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

                // echo $message;


                $mail->Body  = $message;
                $mail->send();
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            $ref_query = "INSERT INTO references_people( name, relation, email, phone, main_email) VALUES ('$ref_name','$ref_relation','$ref_email_add','$ref_phone_number','$logged_in_email_address')";

            $ref_result = mysqli_query($connection, $ref_query);

            if (mysqli_affected_rows($connection) < 1) {
                echo "Error occured while inserting reference people";
                exit();
            }
        }
    }

    ///////////////////////////////////////////// Reference END  /////////////////////////////////////////////

    // $phone1 = '';
    // foreach ($phone2 as  $value) {
    //     $phone1 .= $value . ' - ';
    // }

    $reference_email_address = $_COOKIE['loggedIn'];

    $query = "INSERT INTO main_form( first_name, last_name, date_of_birth, birth_country, nationality, nationality_second, residential_country, district, afghan_check, volayat, volaswali, tazkira, qualification, specialization, university, university_country, profession, experience, job, last_employer, employement_country, area_of_contribution, live_in_afg, relocation, perfered_city, mode_of_engagement, period_of_engagement, proposal, sector, proposal_attachment, start_work, personal_requirements, project_requirements, phone, email_address, website_address, linkedin_page, reference, feedback, email) VALUES ('$first_name', '$last_name', '$date_of_birth', '$birth_country', '$nationality', '$nationality_second', '$residential_country', '$district', '$afghan_check', '$volayat', '$volaswali', '$tazkira', '$qualification', '$specialization', '$university', '$university_country', '$profession', '$experience', '$job', '$last_employer', '$employement_country', '$area_of_contribution', '$live_in_afg', '$relocation', '$perfered_city', '$mode_of_engagement', '$period_of_engagement', '$proposal', '$sector', '$proposal_attachment_name', '$start_work', '$personal_requirements', '$project_requirements', '$phone', '$email_address', '$website_address', '$linkedin_page', '$reference', '$feedback', '$reference_email_address' )";

    echo $query;

    $result = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection) > 0) {
        header('location: ./../filled_form.php?thankyou');
    } else {
        $error =  mysqli_error($connection);
        header('location: ./../filled_form.php?faild');
    }
}
