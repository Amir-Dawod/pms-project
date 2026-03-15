<?php

require("../../core/functions.php");
require("../../core/validation.php");
if (requestMethod('POST')) {
 var_dump($_POST) ."<br>";
 var_dump(preg_match("/^\+[0-9 ( ) -]+$/", $_POST['phone']));
 exit();
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
