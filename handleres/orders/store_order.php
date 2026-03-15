<?php
require("../../core/functions.php");

$path = __DIR__ . "/../../data/order_user.json";
$oldDataUsers = json_decode(file_get_contents($path), true) ?? [];
$user = getDataUser($_SESSION['user']['user_id']);
$orders = $_SESSION['carts'];
[ ,$totalPrice]=getAllOrders();

if (empty($oldDataUsers)) {
    $newId = 1;
} else {
    $Ids = array_column($oldDataUsers, "id");
    $newId = max($Ids) + 1;
}
$orderUser = [
    "id" => $newId,
    "user_id" => $user['user_id'],
    "name" => $user['name'],
    "email" => $user['email'],
    "phone" => $user['phone'],
    "role" =>  $user['role'],
    "products" => $orders,
    "totalPrice" => $totalPrice
];

$oldDataUsers[] = $orderUser;


file_put_contents($path, json_encode($oldDataUsers, JSON_PRETTY_PRINT));
header("location:../../views/client/order_user.php");

unset($_SESSION['carts']);
exit();


