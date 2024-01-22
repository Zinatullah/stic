<?php
$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');

if (isset($_POST['submit'])) {

    $email_address = $_COOKIE['loggedIn'];

    $check_query = 'select * from main_form where email_address = "' . $email_address . '"';
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

    if ($reference == 'yes' ) {
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

            $ref_query = "INSERT INTO references_people( name, relation, email, phone, main_email) VALUES ('$ref_name','$ref_relation','$ref_email_add','$ref_phone_number','$logged_in_email_address')";

            $ref_result = mysqli_query($connection, $ref_query);
            
            if(mysqli_affected_rows($connection) < 1){
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

    $result = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection) > 0) {
        header('location: ./../filled_form.php?thankyou');
    } else {
        $error =  mysqli_error($connection);
        header('location: ./../filled_form.php?faild');
    }
}
