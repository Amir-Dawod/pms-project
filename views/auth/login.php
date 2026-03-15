<?php require_once(__DIR__ . '/../../inc/header.php'); ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                                <h2 class="text-bg-success text-center text-light w-50 p-2 mx-auto mb-5 fw-bold rounded-3">  Login </h2>

                <form action="<?= BASE_URL ?>handleres/auth/login_handle.php" method="post" class="form border my-2 p-3" >
                    <div class="mb-3">
                      
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                      
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                       
                      
                        <div class="mb-3">
                            <input type="submit" value="Login" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once(__DIR__ . '/../../inc/footer.php'); ?>