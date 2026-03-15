<?php
require("../../core/functions.php");
if (isset($_SESSION['user'])) {
   header('location: ../../views/client/checkout.php');
   exit();
} else {
    header('location: ../../views/auth/login.php');
    exit();
}
