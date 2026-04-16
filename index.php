<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "admin@gmail.com" && $password == "123") {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
        exit();
    } elseif (empty($email) || empty($password)) {
        header("Location: login.php?msg=missing");
        exit();
    } else {
        header("Location: login.php?msg=error");
        exit();
    }
}

?>