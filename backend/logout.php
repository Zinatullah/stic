<?php 

setcookie('loggedIn', '', time() - 3600, '/');
header('location: ./../index.php');
