<?php
require("../../core/functions.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}
if (requestMethod('POST')) {
    $user_id = $_POST['id'];
    $userType = $_POST['user_type'];
    $userJson = __DIR__ . "/../../data/users.json";
    $users = json_decode(file_get_contents($userJson), true);

    foreach ($users as $key => &$user) {
        if ($user['user_id'] == $user_id) {
            $user['role'] = $userType;
        }
    }
    file_put_contents($userJson, json_encode($users, JSON_PRETTY_PRINT));

    setMessage("success", "user edited  successfully");
    header("location:../../views/admin/users/all_users.php");
    exit();
}
