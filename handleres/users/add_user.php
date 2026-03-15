<?php
require("../../core/functions.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}
if (requestMethod('POST')) {
    foreach ($_POST as $field => $value) {
        $$field = fieldSanitization($value);
    }
    addUser($name, $email, $phone, $password);
    setMessage("success", "added user  successfully");
    header("location:../../views/admin/users/create_user.php");
    exit();
}
