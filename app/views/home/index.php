    <?php require_once 'app/views/templates/header.php' ?>

    <div class="container mt-5">
        <div class="page-header text-center mb-4" id="banner">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="display-4">Hey, <?= htmlspecialchars($_SESSION['username']) ?></h1>
                    <p class="lead"><?= date("F jS, Y"); ?></p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <a href="/logout" class="btn btn-danger">Click here to logout</a>
            </div>
        </div>

        <?php require_once 'app/views/templates/footer.php' ?>
    </div>
