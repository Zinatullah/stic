<?php

$conn = mysqli_connect("localhost:3306", "akrami", "afghan", "sti");

if (isset($_GET['mail'])) {
    $mail = $_GET['mail'];
    $otp = $_GET['otp'];

    $sql = "UPDATE auth_users SET is_verified='true' WHERE email='" . $mail . "' and verification_code=" . $otp;
    $result = mysqli_query($conn, $sql);
    $rowsAffected = mysqli_affected_rows($conn);

    if ($rowsAffected > 0) {
        $cookie_name = 'loggedIn';
        setcookie($cookie_name, $mail, time() + 36000, "/");
        header('location: ../contribut.php');
    } else {
        $query = 'select * from auth_users where email = "' . $mail . '" and is_verified = "true"';
        $result = mysqli_query($conn, $query);

        $row_count = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
            $cookie_name = 'loggedIn';
            setcookie($cookie_name, $mail, time() + 36000, "/");
            header('location: ../contribut.php');
            exit();
        } else {
            header('location: ../index.php');
            exit();
        }
    }

    echo "Incorrect info";
}
