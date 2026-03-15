            <?php require_once(__DIR__ . '/../../inc/header.php'); ?>

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
                        <div class="col-8 mx-auto">
                            <h2 class="text-bg-success text-center text-light w-50 p-2 mx-auto mb-5 fw-bold rounded-3"> Contact </h2>

                            <form action="<?= BASE_URL ?>handleres/pages/contact.handle.php" method="POST" id="form-contact" class="form border my-2 p-3">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="7"></textarea>
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

            <?php require_once(__DIR__ . '/../../inc/footer.php'); ?>