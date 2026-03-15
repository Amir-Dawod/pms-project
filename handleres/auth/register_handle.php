<?php

require("../../core/functions.php");
require("../../core/validation.php");
if (requestMethod('POST')) {
    foreach ($_POST as $field => $value) {
        $$field = fieldSanitization($value);
    }
    $error = validateRegister($name, $email, $phone, $password, $confirm_password);


    if (!empty($error)) {
        setMessage("danger", $error);
        header("location: ../../views/auth/register.php");
        exit();
    }

    if (register($name, $email, $phone, $password)) {
        setMessage("success", "user register  successfully");
        header("location:../../views/auth/login.php");
        exit();
    }
}
