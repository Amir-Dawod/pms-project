<?php
require("../../core/functions.php");
require("../../core/validation.php");
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}
if (requestMethod('POST')) {
    $id = $_POST['id'];
    $title = fieldSanitization($_POST['title']);
    $price = $_POST['price'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];

    $product = getProduct($id);
    $newImageName = empty($imageName) ?  $product['imageName'] : $imageName;
    $newImageTmpName = empty($imageTmpName) ?  $product['imageTmpName'] : $imageTmpName;
    $newImageSize = empty($imageSize) ?  $product['imageSize'] : $imageSize;
    $imageExtension = pathinfo($newImageName, PATHINFO_EXTENSION);
  
    $error = validateProduct($newImageName, $newImageTmpName, $title, $price, $imageExtension, $newImageSize);
    if (!empty($error)) {
        setMessage("danger", $error);
        header("location: ../../views/admin/products/edit_product.php");
        exit();
    }
    editProduct($id, $title, $price, $newImageName, $newImageTmpName, $newImageSize);
    setMessage("success", "succcess edited product ");
    header("location: ../../index.php");
    exit();
}
