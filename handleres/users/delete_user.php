<?php
require("../../core/functions.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
}

deleteUser($user_id);
setMessage("success", "user delete  successfully");
header("location:../../views/admin/users/all_users.php");

exit();
