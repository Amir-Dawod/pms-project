<?php


function validateRequired($value, $fieldName)
{
    return empty($value) ? "$fieldName is required" : null;
}



function validateName($name)
{
    return  preg_match("/^[a-zA-Z ]+$/", $name) ? null : 'invalid Name';
}


function validateEmail($email)
{
    return  filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "invalid Email";
}



function validatePhone($phone)
{
    return  preg_match("/^\+[0-9 ( ) -]+$/", $phone)  ? null : " invalid Phone ";
}



function validatePassword($password)
{
    if (!preg_match("/[A-Z]/", $password)) {
        return "password must be contains char captial";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "password must be contains char small";
    }
    if (!strlen($password) > 6) {
        return "password must be not  lower than 6";
    }
}



function checkPassword($password, $confirm_password)
{
    if ($password != $confirm_password) {
        return "password is match ";
    }
}


function validateRegister($name, $email, $phone, $password, $confirm_password)
{

    $fields = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => $password,
        "confirm_password" => $confirm_password
    ];
    foreach ($fields as $fieldName => $value) {
        if ($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }
    if ($error = validateName($name)) {
        return $error;
    }

    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validatePhone($phone)) {
        return $error;
    }

    if ($error = validatePassword($password)) {
        return $error;
    }

    if ($error = checkPassword($password, $confirm_password)) {
        return $error;
    }
}


function validateLogin($email, $password)
{

    $fields = [
        "email" => $email,
        "password" => $password
    ];
    foreach ($fields as $fieldName => $value) {
        if ($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }
}

function validateImage($imageExtension, $imageSize, $imageTmpName)
{

    $allowedExtensions = ['png', 'jpg', 'jpeg', 'svg'];
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($imageExtension, $allowedExtensions)) {
        return "Image extension not supported. Please use: " . implode(' , ', $allowedExtensions);
    }
    if ($imageSize > $maxSize) {
        return "The image size is too large, maximum 2MB";
    }
      


    if (empty($imageTmpName) && !is_uploaded_file($imageTmpName)) {
        return "The file is invalid";
    }
}

function validateProduct($imageName, $imageTmpName, $title, $price, $imageExtension, $imageSize)
{
    $fields = [
        "image" => $imageName,
        "title" => $title,
        "price" => $price

    ];
    foreach ($fields as $fieldName => $value) {
        if ($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }
    if ($error = validateImage($imageExtension, $imageSize, $imageTmpName)) {
        return $error;
    }
}


function validateContact($name, $email, $phone, $message)
{

    $fields = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "messswage" => $message
    ];
    foreach ($fields as $fieldName => $value) {
        if ($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }
    if ($error = validateName($name)) {
        return $error;
    }

    if ($error = validateEmail($email)) {
        return $error;
    }

    if ($error = validatePhone($phone)) {
        return $error;
    }
}
