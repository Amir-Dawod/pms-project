<?php

require_once(__DIR__ . '/../../../inc/header.php');

?>
<?php if ($users = getUsers()): ?>

    <table class="table table-bordered text-center w-50 m-auto align-middle mb-5 border border-2">
        <h2 class="text-bg-success text-center text-light w-25 py-2 mt-5  mx-auto mb-5 fw-bold rounded-3"> Users</h2>

        <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">role</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user): ?>
                <tr class=" text-center">
                    <th scope="row"><?= $key + 1  ?></th>
                    <td><?= $user["name"] ?></td>
                    <td><?= $user["email"] ?></td>
                    <td><?= $user["role"] ?></td>
                    <td>
                        <a href='edit_user.php?id=<?= $user["user_id"] ?>' class='btn btn-success mx-3'>Edit</a>
                        <a href='<?= BASE_URL ?>handleres/users/delete_user.php?id=<?= $user["user_id"] ?>' class='btn btn-danger'>Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
<?php else: ?>
    <h2 class=" p-5 text-center "> users is empty</h2>
<?php endif; ?>
<?php require_once(__DIR__ . '/../../../inc/footer.php');
