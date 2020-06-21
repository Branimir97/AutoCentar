<?php

session_start();
session_unset();
session_destroy();

if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    setcookie('email', $email, time() -1);
    setcookie('password', $password, time() -1);
    unset($email);
    unset($password);
}

header("Location: ../../homepage.php");

?>
