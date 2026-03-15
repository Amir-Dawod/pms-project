<?php

require("../../core/functions.php");

$id =  $_GET['id'];
addToCart($id);
header("location:../../index.php");
exit();
