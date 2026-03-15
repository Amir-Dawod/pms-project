<?php require_once(__DIR__ . '/../../../inc/header.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
}
$product = getProduct($_SESSION['id']);
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h2 class="text-bg-success text-center text-light w-50 p-2 mx-auto mb-5 fw-bold rounded-3"> edit Product</h2>
                <form action="<?= BASE_URL ?>handleres/products/edit_product.php" method="post" class="form border my-2 p-3" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="photo"> current Image : </label>
                        <div class="mb-3 text-center">
                            <img class=" img-fluid w-50 h-50  mx-auto" src="<?= BASE_URL ?>assets/uploads/<?= $product['imageName'] ?>" alt="" srcset="">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class=" mb-3">change Image : </label>
                            <input type="file" name="image" id="photo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <input type="hidden" name="id" id="id" class="form-control" value="<?= $product['id'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="mb-2">title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?= $product['title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="mb-2">price</label>
                            <input type="number" name="price" id="price" class="form-control" value="<?= $product['price'] ?>">
                        </div>
                        <div class="mb-3 text-center ">
                            <input type="submit" value="edit" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once(__DIR__ . '/../../../inc/footer.php'); ?>