<?php

require("../../core/functions.php");
require("../../core/validation.php");
if (requestMethod('POST')) {
    foreach ($_POST as $field => $value) {
        $$field = fieldSanitization($value);
    }
    $error = validateContact($name, $email, $phone, $message);

    if (!empty($error)) {
        setMessage("danger", $error);
        header("location: ../../views/pages/contact.php");
        exit();
    }


    setMessage("success", "send  conatct  successfully");
    header("location: ../../views/pages/contact.php");
    exit();
}
