<?php

require("../../core/functions.php");

$id =  $_GET['id'];
deleteCart($id);
header("location:../../views/client/cart.php");
exit();
