<?php require_once(__DIR__ . '/../../../inc/header.php');
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $_SESSION['user_id'] = $user_id;
}
$user = getDataUser($_SESSION['user_id']);
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h2 class="text-bg-success text-center text-light w-50 p-2 mx-auto mb-5 fw-bold rounded-3"> edit User</h2>
                <form action="<?= BASE_URL ?>handleres/users/edit_user.php" method="post" class="form border my-2 p-3" enctype="multipart/form-data">
                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="name" class="mb-2">Name</label>
                            <input type="text" name="name" id="name" class="form-control" readonly value="<?= $user['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" name="email" id="email" class="form-control" readonly value="<?= $user['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id" class="form-control" value="<?= $user['user_id'] ?>">
                        </div>
                        <!-- choose country select-->
                        <select class="form-select mb-3" aria-label="Default select example" id="country" name="user_type">
                            <option value="user" <?= $user['role'] == "user" ? "selected" : "" ?>>user</option>
                            <option value="admin" <?= $user['role'] == "admin" ? "selected" : "" ?>>admin</option>
                        </select>
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