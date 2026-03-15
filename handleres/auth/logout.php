<?php

session_start();
session_unset();
header("location: ../../views/auth/login.php");
exit();
