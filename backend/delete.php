<?php

$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');
$connection->set_charset("utf8");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $remove_query = 'DELETE FROM `references_people` WHERE id = ' . $id;
    $remove_result = mysqli_query($connection, $remove_query);

    if (mysqli_affected_rows($connection) > 0) {
        header('location: ../filled_form.php?remove');
    } else {
        header('location: ../filled_form.php?Faild');
    }
}
