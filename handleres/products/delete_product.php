<?php

require("../../core/functions.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}
$id = $_GET['id'];

deleteProduct($id);
setMessage("success", "succcess deleted product ");

header("location:../../index.php");
exit();
