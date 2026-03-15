<?php
require_once('../../inc/header.php');

?>


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
            <div class="col-4">
                <div class="border p-2">
                    <?php if ( [$allOrders, $totalPrice] = getAllOrders()) : ?>
                        <div class="products">
                            <ul class="list-unstyled">
                                <?= $allOrders ?>
                            </ul>
                        </div>
                        <h3>Total : $ <?= $totalPrice ?></h3>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-8">
                <?php $user = getDataUser($_SESSION['user']['user_id']) ?>
                <form action="<?= BASE_URL ?>handleres/orders/store_order.php" method="post" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?= $user['name']  ?>" disabled readonly id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?= $user['email']  ?>" disabled readonly id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" placeholder=" write here" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" value="<?= $user['phone']  ?>" disabled readonly  id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" id="" placeholder=" write here" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('../../inc/footer.php'); ?>