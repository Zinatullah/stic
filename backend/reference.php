<?php

$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');

$reference = isset($_POST['reference']) ? $_POST['reference'] : 'NULL';
if (isset($_POST['submit'])) {

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

        if (mysqli_affected_rows($connection) < 1) {
            echo "Error occured while inserting reference people";
            exit();
        }
    }

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?refre_update');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}
