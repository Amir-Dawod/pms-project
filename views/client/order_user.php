<?php
require_once(__DIR__ . '/../../inc/header.php');
$path = __DIR__ . "/../../data/order_user.json";
$users = json_decode(file_get_contents($path), true) ?? [];
$orderUser = [];
foreach ($users as $user) {
    if ($_SESSION['user']['user_id'] == $user['user_id']) {
        $orderUser[] = $user['products'];
    }
}
if ($orderUser) {
    krsort($orderUser);
}
$orderNumber=0;
?>
<?php if ($orderUser): ?>

    <?php foreach ($orderUser as $key => $orders): ?>


    <h2 class="text-bg-success text-center text-light w-25 py-2  mt-5  mx-auto mb-5 fw-bold rounded-3"> Order <?= $orderNumber+=1 ?></h2>

        <table class="table table-bordered  w-50 m-auto mt-4 align-middle mb-5 border border-2">


            <thead>
                <tr class=" text-center">
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">total</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalPrice = 0; ?>
                <?php foreach ($orders as $key => $order): ?>
                    <?php $totalPrice += $order["quantity"] * $order["price"]; ?>
                    <tr class=" text-center">
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $order["title"] ?></td>
                        <td><img class="w-25 h-25" src="../../assets/uploads/<?= $order["imageName"] ?>" alt=""></td>
                        <td><?= $order["price"] ?></td>
                        <td><?= $order["quantity"] ?></td>
                        <td><?= $order["quantity"] * $order["price"] ?></td>
                    </tr>


                <?php endforeach; ?>
                <tr>
                    <td colspan="3">
                        <h3>Total price</h3>
                    </td>
                    <td colspan="3" class=" text-center"> <?= $totalPrice ?></td>
                </tr>
            </tbody>
        </table>
    <?php endforeach; ?>
<?php else: ?>
    <h2 class=" p-5 text-center "> order is empty</h2>
<?php endif; ?>
<?php require_once(__DIR__ . '/../../inc/footer.php'); ?>