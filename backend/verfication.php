<?php
session_start();

if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // connect with database
    $conn = mysqli_connect("localhost:3306", "akrami", "afghan", "sti");

    $check_query = 'select * from auth_users where email = "' . $email . '" and is_verified = "true"';
    $result_1 = $conn->query($check_query);

    $data = mysqli_fetch_row($result_1);
    $cookie_name = 'loggedIn';
    $cookie_email = $data[2];
    if ($result_1->num_rows > 0) {
        setcookie($cookie_name, $cookie_email, time() + 36000, "/");
        header('location: ../components/mainform/index.php');
        return;
    }

    // mark email as verified
    $sql = "UPDATE auth_users SET is_verified = 'true' WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result  = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 0) {
        unset($_SESSION['email_check']);
        $_SESSION['error_message'] = 'Incorrect username or password.';
        header('location: ../verification.php?email=' . $email);
    } else {
        setcookie($cookie_name, $cookie_email, time() + 36000, "/");
        header('location: ../components/mainform/index.php');
        return;
    }

}

?>