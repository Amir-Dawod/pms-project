<?php 
     require_once(__DIR__ . '/../../../inc/header.php');
   
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}

?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2 class="text-bg-success text-center text-light w-50 p-2 mx-auto mb-5 fw-bold rounded-3"> add Product </h2>


                <form action="<?= BASE_URL ?>handleres/products/create_product.php" method="post" class="form border my-2 p-3" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="photo">photo</label>
                            <input type="file" name="image" id="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="name">title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price">price</label>
                            <input type="number" name="price" id="price" class="form-control">
                        </div>
                
                        <div class="mb-3">
                            <input type="submit" value="Add" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once(__DIR__ . '/../../../inc/footer.php'); ?>