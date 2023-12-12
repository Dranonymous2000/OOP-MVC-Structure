<?php

session_start();
error_reporting(E_ALL);
include_once "../classes/Register.php";

if ($_POST && isset($_POST["login_submit"])) {
    // Fetch form values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate email and password fields if empty
    if (empty($email) || empty($password)) {
        $_SESSION["login_error"] = "All fields are required";
        header("location:../login.php");
        exit();
    }

    $user = new User();
    $response = $user->login($email, $password);

    if ($response === true) {
        header("location:../main.php");
        exit();
    } else {
        $_SESSION["login_error"] = "Either email or password is incorrect";
        header("location:../index.php");
        exit();
    }
   }

?>
