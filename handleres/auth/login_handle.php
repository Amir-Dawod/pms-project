<?php

require("../../core/functions.php");
require("../../core/validation.php");
if (requestMethod('POST')) {
    foreach ($_POST as $field => $value) {
        $$field = fieldSanitization($value);
    }
    $error = validateLogin($email, $password);
    if (!empty($error)) {
        setMessage("danger", $error);
        header("location: ../../views/auth/login.php");
        exit();
    }

    if (login($email, $password)) {

        setMessage("success", "user login  successfully");
        header("location: ../../index.php");
        exit();
    } else {
        setMessage("danger", "incorrect email or password");
        header("location: ../../views/auth/login.php");

        exit();
    }
}
