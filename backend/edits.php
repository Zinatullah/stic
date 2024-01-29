<?php
$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');

if (isset($_COOKIE['loggedIn'])) {
    $email = $_COOKIE['loggedIn'];
    $pre_data_query = 'SELECT * FROM  main_form  where email ="' . $email . '"';
    $pre_result = mysqli_query($connection, $pre_data_query);
    $pre_data = mysqli_fetch_row($pre_result);
}

//////////////////////////////////////////// Personal info section //////////////////////////////////////////////////////
if (isset($_POST['personal_info_submit'])) {
    $email_address = $_COOKIE['loggedIn'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $birth_country = isset($_POST['birth_country']) ? $_POST['birth_country'] : $pre_data[4];
    $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : $pre_data[5];
    $nationality_second = isset($_POST['nationality_second']) ? $_POST['nationality_second'] : '';
    $residential_country = isset($_POST['residential_country']) ? $_POST['residential_country'] : $pre_data[6];

    $district = $_POST['district'];
    $afghan_check = isset($_POST['afghan_check']) ? $_POST['afghan_check'] : 'NULL';
    $afghan_check  . '<br />';
    $volayat = isset($_POST['volayat']) ? $_POST['volayat'] : '';
    $volaswali = isset($_POST['volaswali']) ? $_POST['volaswali'] : '';
    $tazkira = isset($_POST['tazkira']) ? $_POST['tazkira'] : '';

    $sql = "UPDATE main_form SET first_name = '$first_name', last_name = '$last_name', date_of_birth = '$date_of_birth', birth_country = '$birth_country', nationality = '$nationality', nationality_second = '$nationality_second', residential_country = '$residential_country', district = '$district', afghan_check = '$afghan_check', volayat = '$volayat', volaswali = '$volaswali', tazkira = '$tazkira' where email = '" . $email_address . "'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?success');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}

//////////////////////////////////////////// Education section //////////////////////////////////////////////////////
if (isset($_POST['education_info_btn'])) {
    $email_address = $_COOKIE['loggedIn'];

    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];
    $university = $_POST['university'];
    $university_country = isset($_POST['university_country']) ? $_POST['university_country'] : $pre_data[16];
    $profession = $_POST['profession'];
    $experience = $_POST['experience'];
    $job = $_POST['job'];
    $last_employer = $_POST['last_employer'];
    $employement_country = isset($_POST['employement_country']) ? $_POST['employement_country'] : $pre_data[21];
    $area_of_contribution = $_POST['area_of_contribution'];

    $edu_query = "UPDATE  main_form  SET qualification = '$qualification', specialization = '$specialization', university = '$university', university_country = '$university_country', profession = '$profession', experience = '$experience', job = '$job', last_employer = '$last_employer', employement_country = '$employement_country' , area_of_contribution = '$area_of_contribution'
     where email = '" . $email_address . "'";

    $result = mysqli_query($connection, $edu_query);

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?success');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}

//////////////////////////////////////////// Relocation section //////////////////////////////////////////////////////
if (isset($_POST['relocation_btn'])) {
    $email_address = $_COOKIE['loggedIn'];

    $perfered_city = isset($_POST['perfered_city']) ? $_POST['perfered_city'] : $pre_data[25];
    $mode_of_engagement = isset($_POST['mode_of_engagement']) ? $_POST['mode_of_engagement'] : $pre_data[26];
    $period_of_engagement = isset($_POST['period_of_engagement']) ? $_POST['period_of_engagement'] : $pre_data[27];

    $relocation_query = "UPDATE main_form SET live_in_afg= 'no', relocation = 'yes', perfered_city= '$perfered_city',mode_of_engagement= '$mode_of_engagement' ,period_of_engagement= '$period_of_engagement' where email = '" . $email_address . "'";

    echo $relocation_query;
    
    $result_relocation = mysqli_query($connection, $relocation_query);

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?success');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}

//////////////////////////////////////////// Proposal section //////////////////////////////////////////////////////
if (isset($_POST['proposal_btn'])) {
    $email_address = $_COOKIE['loggedIn'];

    $sector = isset($_POST['sector']) ? $_POST['sector'] : $pre_data[29];

    $proposal_attachment = isset($_FILES['proposal_attachment']) ? $_FILES['proposal_attachment'] : 'NULL';
    $proposal_attachment_name = $proposal_attachment['name'] == '' ?  $pre_data[30] : $proposal_attachment['name'];

    echo $proposal_attachment_name;

    $start_work = isset($_POST['start_work']) ? $_POST['start_work'] : $pre_data[31];
    $personal_requirements = $_POST['personal_requirements'];
    $project_requirements = $_POST['project_requirements'];

    $proposal_query = "UPDATE  main_form  SET proposal='yes', sector = '$sector', proposal_attachment = '$proposal_attachment_name', start_work = '$start_work', personal_requirements = '$personal_requirements', project_requirements = '$project_requirements' where email = '" . $email_address . "'";

    if ($proposal_attachment['name'] != ' ') {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($proposal_attachment_name);

        if (move_uploaded_file($_FILES["proposal_attachment"]["tmp_name"], $targetFile)) {
            // echo "File uploaded successfully.";
        }
    }

    $result_proposal = mysqli_query($connection, $proposal_query);

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?success');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}

//////////////////////////////////////////// Contact section //////////////////////////////////////////////////////
if (isset($_POST['contact_btn'])) {
    $email_address1 = $_COOKIE['loggedIn'];

    $phone = $_POST['phone'];
    $email_address = $_POST['email_address'];
    $dial_code = $_POST['dial_code'];
    $website_address = $_POST['website_address'];
    $linkedin_page = $_POST['linkedin_page'];
    $feedback = $_POST['feedback'];


    /////////////////////////////// Phone number issue START  ///////////////////////////////
    $edited_phone_number = '';
    $text = $phone;
    $search = "+";
    $position = stripos($text, $search);
    if ($position !== false) {
        $edited_phone_number = $phone;
    } else {

        $number = $dial_code;
        $countryCode = substr($number, 0, 3);
        $edited_phone_number =  $countryCode . $phone;
    }
    ///////////////////////////////// Phone number issue END  ///////////////////////////////

    $contact_query = "UPDATE main_form SET phone = '$edited_phone_number', email_address = '$email_address', website_address = '$website_address', linkedin_page = '$linkedin_page', feedback = '$feedback' where email = '" . $email_address1 . "'";

    echo $contact_query;
    $result_contact = mysqli_query($connection, $contact_query);

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?success');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}

//////////////////////////////////////////// Reference section //////////////////////////////////////////////////////
if (isset($_POST['ref_btn'])) {
    $email_address = $_COOKIE['loggedIn'];

    $ref_person_name = $_POST['ref_person_name'];
    $ref_relation_with = $_POST['ref_relation_with'];
    $ref_email_address = $_POST['ref_email_address'];
    $ref_phone = $_POST['ref_phone'];
    $ref_id = $_POST['ref_id'];

    $ref_query = "UPDATE  references_people  SET  name = '$ref_person_name' , relation = '$ref_relation_with' , email = '$ref_email_address' , phone = '$ref_phone' , main_email = '$email_address'  WHERE id = '$ref_id'";

    mysqli_query($connection, $ref_query);

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?refre_update');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}
