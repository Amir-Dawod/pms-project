<?php

session_start();
$id = $_GET['id'];
$operator = $_GET['operator'];

if (isset($_SESSION['carts'])) {
    foreach ($_SESSION['carts'] as $key => &$cart) {
        if ($cart['id'] == $id) {
            if ($operator == "increment") {

                $cart['quantity'] += 1;

            } else {

                $cart['quantity'] -= 1;

                if ($cart['quantity'] < 1) {

                    unset($_SESSION['carts'][$key]); 

                }
            }
        }
    }
}

header('location:../../index.php');
exit();
