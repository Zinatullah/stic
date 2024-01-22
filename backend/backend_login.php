<?php

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $conn = mysqli_connect("localhost:3306", "akrami", "afghan", "sti");
    $sql = 'select * from auth_users where email = "' . $email . '"';
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_row($res);

    $cookie_email = $data[2];
    $cookie_name = 'loggedIn';

    $db_pwd = $data[3];
    $db_email = $data[2];
    $db_verification = $data[5] == 'true' ? true : false;

    $check_pwd = password_verify($pwd, $db_pwd);


    if ($email === $db_email && $check_pwd && $db_verification) {
        setcookie($cookie_name, $cookie_email, time() + 36000, "/");
        header('location: ../index.php');
    } else {
        header('location: ../login.php?check=faild');
    }
}
