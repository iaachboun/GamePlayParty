<?php
require '../model/logic.php'

if (isset($_POST['login-submit'])) {
    $email = $_POST['email'];
    $password = $_POST['wachtwoord'];

    if (empty($email) || empty($password)) {
        header("Location:../index.php");
        exit();
    }
}
else {
    header("Location:../index.php");
    exit();
}