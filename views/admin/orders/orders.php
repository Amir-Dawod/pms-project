<?php
require_once(__DIR__ . '/../../../inc/header.php');
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    die("Access Denied");
}


?>
<?php if ($orderUsers = getAllOrderUsers()): ?>
    <h2 class="text-bg-success text-center text-light w-25 py-2  mt-5  mx-auto mb-5 fw-bold rounded-3"> Orders</h2>

    <table class="table table-bordered  w-50 m-auto align-middle mb-5 border border-2 text-center m-5 ">

        <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderUsers as $key => $orderUser): ?>
                <tr>
                    <th scope="row"><?= $key + 1;  ?>
                    </th>
                    <td><?= $orderUser['name'] ?></td>
                    <td><?= $orderUser['email'] ?></td>
                    <td><?= $orderUser['totalPrice'] ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <h2 class=" p-5 text-center "> order is empty</h2>
<?php
endif;
require_once(__DIR__ . '/../../../inc/footer.php');
?>