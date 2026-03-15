<?php require_once('../../inc/header.php'); ?>

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
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($allCarts = getAllCartItems()) : ?>
                            <?= $allCarts ?>
                        <?php else: ?>

                            <tr>
                                <td colspan="6" class="text-center">Your cart is empty</td>
                            </tr>                       
                        <?php endif; ?>




                    </tbody>
                </table>
                <div class="order d-flex justify-content-end">

                    <a class=" bg-success p-2 text-center m-2 text-decoration-none rounded-2 text-light" href="../../handleres/orders/create_order.php"> create Order</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('../../inc/footer.php'); ?>

