<?php require("inc/header.php"); ?>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-2 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center gap-4">
            <?php if ($allProducts = getAllProducts()): ?>
                <?php foreach ($allProducts as $key => $product) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top w-50 h-50 mx-auto mt-3" src="assets/uploads/<?= $product["imageName"] ?>" alt=... />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"> <?= $product["title"] ?></h5>
                                </div>
                                <div class="text-center">
                                    <h5 class="fw-bolder"> <?= $product["price"] ?></h5>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <?php if(getRole()):?>
                                    <div class="text-center">
                                        <a class="btn btn-outline-success mt-auto mx-2 my-3" href="views/admin/products/edit_product.php?id=<?= $product["id"] ?>"> edit </a>
                                        <a class="btn btn-outline-danger mt-auto mx-2 my-3" href="handleres/products/delete_product.php?id=<?= $product["id"] ?>"> delete </a>
                                        </div>
                                <?php else :?>
                                    <?php if ($quantity = getCartQuantity($product["id"])): ?>
                                        <div class="text-center">
                                            <a class="btn btn-outline-success mt-auto" href="handleres/cart/counter_cart.php?id=<?= $product["id"] ?>&operator=decrement"> - </a>
                                            <span class="btn btn-outline-dark mt-auto"><?= $quantity  ?></span>
                                            <a class="btn btn-outline-success mt-auto" href="handleres/cart/counter_cart.php?id=<?= $product["id"] ?>&operator=increment"> + </a>
                                        </div>
                                    <?php else: ?>
    
                                        <div class="text-center">
                                            <a class="btn btn-outline-success mt-auto" href="handleres/cart/add_cart.php?id=<?= $product["id"] ?>">Add to cart</a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <h2> your product is empty </h2>
            <?php endif; ?>

        </div>
    </div>
</section>
<?php require_once("inc/footer.php"); ?>