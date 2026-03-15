<?php

session_start();


function requestMethod($method)
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}



function fieldSanitization($value)
{
    return htmlspecialchars(trim($value));
}


function setMessage($type, $message)
{
    $_SESSION['message'] = [
        "type" => $type,
        "text" => $message
    ];
}


function showMessage()
{

    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];
        echo "<div class= 'alert alert-$type' > $text</div>";
        unset($_SESSION['message']);
    }
}


function register($name, $email, $phone, $password)
{
    $usersJson = __DIR__ . "/../data/users.json";
    $oldDataUsers = json_decode(file_get_contents($usersJson), true);
    if (empty($oldDataUsers)) {
        $newId = 1;
    } else {

        $ids = array_column($oldDataUsers, "user_id");
        $newId = max($ids) + 1;
    }

    $user = [
        "user_id" => $newId,
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "role" => "user"
    ];
    $oldDataUsers[] = $user;
    file_put_contents($usersJson, json_encode($oldDataUsers, JSON_PRETTY_PRINT));
    return true;
}



function login($email, $password)
{

    $usersJson = __DIR__ . "/../data/users.json";
    $users = json_decode(file_get_contents($usersJson), true);
    foreach ($users as $user) {

        if ($user['email'] == $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                "user_id" => $user['user_id'],
                "name" => $user['name'],
                "email" => $user['email'],
                "role" => $user['role']


            ];
            return true;
        }
    }

    return  false;
}


function addToCart($id)
{
    $product = getProduct($id);
    $found = true;
    if (isset($_SESSION['carts'])) {
        foreach ($_SESSION['carts'] as &$cart) {
            if ($cart['id'] == $id) {
                $cart['quantity'] += 1;
                $found = false;
            }
        }


        if ($found) {
            $_SESSION['carts'][] = [
                "id" => $product["id"],
                "imageName" => $product["imageName"],
                "title" => $product["title"],
                "price" => $product["price"],
                "quantity" => 1

            ];
        }
    } else {
        $_SESSION['carts'][] = [
            "id" => $product["id"],
            "imageName" => $product["imageName"],
            "title" => $product["title"],
            "price" => $product["price"],
            "quantity" => 1

        ];
    }
}


function deleteCart($id)
{


    foreach ($_SESSION['carts'] as $key => &$cart) {
        if ($cart['id'] == $id) {
            if ($cart["quantity"] > 1) {
                $cart['quantity'] -= 1;
            } else {
                unset($_SESSION['carts'][$key]);
            }
        }
    }

    return $_SESSION['carts'];
}





function getAllCartItems()
{
    $allCartItems = "";
    if (isset($_SESSION['carts'])) {

        foreach ($_SESSION['carts'] as $cart) {
            if (isset($cart['quantity'])) {
                $total = $cart["price"] * $cart["quantity"];

                $allCartItems .= "
                                        <tr>
                                            <th scope='row'>{$cart["id"]}</th>
                                            <td>{$cart["title"]}</td>
                                            <td>$ {$cart["price"]}</td>
                                            <td>
                                            <input type='number'   value={$cart["quantity"]}>
                                            </td>
                                            <td>$ {$total}</td>
                                            <td>
                                            <a href='../../handleres/cart/delete_cart.php?id={$cart["id"]}'  class='btn btn-danger'>Delete</a>
                                            </td>
                                        </tr>
                            ";
            }
        }
    }



    return $allCartItems;
}



function countCartItems()
{

    $count = 0;

    if (isset($_SESSION['carts'])) {

        foreach ($_SESSION['carts'] as $cart) {


            if (isset($cart['quantity'])) {
                $count = $count +  $cart['quantity'];
            }
        }
    }

    return $count;
}



function createProduct($title, $price, $imageName, $imageTmpName, $imageSize)
{

    $productsJson = __DIR__ . "/../data/products.json";
    $oldProducts = json_decode(file_get_contents($productsJson), true);

    if (empty($oldProducts)) {
        $newId = 1;
    } else {
        $ids = array_column($oldProducts, "id");
        $newId = max($ids) + 1;
    }
    $product = [
        "id" => $newId,
        "title" => $title,
        "price" => $price,
        "imageName" => $imageName,
        "imageTmpName" => $imageTmpName,
        "imageSize" => $imageSize
    ];
    uploadImage($imageName, $imageTmpName, $imageSize);

    $oldProducts[] = $product;
    file_put_contents($productsJson, json_encode($oldProducts, JSON_PRETTY_PRINT));
    return true;
}



function editProduct($id, $title, $price, $imageName, $imageTmpName, $imageSize)
{
    $productsJson = __DIR__ . "/../data/products.json";
    $allProducts = json_decode(file_get_contents($productsJson), true);
    foreach ($allProducts as &$product) {
        if ($product['id'] == $id) {
            $product['title'] = $title;
            $product['price'] = $price;

            if ($product['imageName'] != $imageName)   uploadImage($imageName, $imageTmpName);
            $product['imageName'] = $imageName;
            $product['imageTmpName'] = $imageTmpName;
            $product['imageSize'] = $imageSize;

        }
    }

    file_put_contents($productsJson, json_encode($allProducts, JSON_PRETTY_PRINT));
}


function deleteProduct($id)
{
    $productsJson = __DIR__ . "/../data/products.json";
    $allProducts = json_decode(file_get_contents($productsJson), true);
    if ($allProducts) {

        foreach ($allProducts as $key => $product) {
            if ($product['id'] == $id) {
                unset($allProducts[$key]);
            }
        }
    }
    $allProducts = array_values($allProducts);


    file_put_contents($productsJson, json_encode($allProducts, JSON_PRETTY_PRINT));
}


function getProduct($id)
{
    $productsJson = __DIR__ . "/../data/products.json";
    $allProducts = json_decode(file_get_contents($productsJson), true);
    foreach ($allProducts as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
}


function getAllProducts()
{
    $productsJson = __DIR__ . "/../data/products.json";
    $allProductsItems = json_decode(file_get_contents($productsJson), true);
    if (!empty($allProductsItems)) {
        return $allProductsItems;
    }
}





function  uploadImage($imageName, $imageTmpName)
{
    $path = __DIR__ . "/../assets/uploads/$imageName";
    if (move_uploaded_file($imageTmpName, $path)) {
        return true;
    }
}



function  getAllOrders()
{

    $allOrders = "";
    $totalPrice = 0;
    $count = 1;
    if (isset($_SESSION['carts'])) {
        foreach ($_SESSION['carts'] as $cart) {
            $totalPrice += $cart["price"] * $cart["quantity"];
            $allOrders .= "
                                          <li class='border p-2 my-1'> {$cart["title"]} #  {$count} -
                                                 <span class='text-success mx-2 mr-auto bold'>{$cart["quantity"]} x $ {$cart["price"]}</span>
                                                </li>
               ";
            $count++;
        }

        return [$allOrders, $totalPrice];
    }
}


function getDataUser($user_id)
{

    $path = __DIR__ . "/../data/users.json";
    $users = json_decode(file_get_contents($path), true);
    foreach ($users as $user) {
        if ($user['user_id'] == $user_id) {
            return $user;
        }
    }
}

function getCartQuantity($id)
{
    if (isset($_SESSION['carts'])) {
        foreach ($_SESSION['carts'] as $cart) {
            if ($cart['id'] == $id && $cart['quantity'] >= 1) {

                return $cart['quantity'];
            }
        }
    }
}



function addUser($name, $email, $phone, $password)
{
    $usersJson = __DIR__ . "/../data/users.json";
    $oldDataUsers = json_decode(file_get_contents($usersJson), true);
    if (empty($oldDataUsers)) {
        $newId = 1;
    } else {

        $ids = array_column($oldDataUsers, "user_id");
        $newId = max($ids) + 1;
    }

    $user = [
        "user_id" => $newId,
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "role" => "admin"
    ];
    $oldDataUsers[] = $user;
    file_put_contents($usersJson, json_encode($oldDataUsers, JSON_PRETTY_PRINT));
    return true;
}

function deleteUser($user_id)
{

    $userJson = __DIR__ . "/../data/users.json";
    $users = json_decode(file_get_contents($userJson), true);
    $orderUserJson = __DIR__ . "/../data/order_user.json";
    $orderUsers = json_decode(file_get_contents($orderUserJson), true);

    foreach ($users as $key => $user) {
        if ($user['user_id'] == $user_id) {
            unset($users[$key]);
        }
    }

    foreach ($orderUsers as $key => $orderUser) {
        if ($orderUser['user_id'] == $user_id) {
            unset($orderUsers[$key]);
        }
    }


    $users = array_values($users);
    $orderUser = array_values($orderUser);

    file_put_contents($userJson, json_encode($users, JSON_PRETTY_PRINT));
    file_put_contents($orderUserJson, json_encode($orderUsers, JSON_PRETTY_PRINT));
}

function getUsers()
{
    $usersJson = __DIR__ . "/../data/users.json";
    $users = json_decode(file_get_contents($usersJson), true);
    return $users;
}
function getRole()
{
    if (isset($_SESSION['user'])) {

        if ($_SESSION['user']['role'] == "admin") {
            return true;
        }
    }
}


function getAllOrderUsers()
{
    $orderUsersJson = __DIR__ . "/../data/order_user.json";
    $orderUsers = json_decode(file_get_contents($orderUsersJson), true);
    if ($orderUsers) {
        rsort($orderUsers);
    }
    return $orderUsers;
}
