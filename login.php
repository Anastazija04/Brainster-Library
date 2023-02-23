<?php
include_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/partials/menu.php';
?>
    <div class="container-fluid bg-warning">
        <div class="row">
            <div class="col-12 mt-2">
                <a href="./index.php" class="text-dark"><b>Home</b></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="py-5 text-center">Log in!</h2>
                <div class="col-4 offset-4 pb-1 mb-4 form-group">
                    <form method="POST" action="./auth/authLogin.php" class="pb-5 mb-3">
                        <?php if(isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['error']?>
                            </div>
                        <?php } else if(isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success']?>
                            </div>
                       <?php } session_destroy(); ?>
                        <label for="username" class="">Username:</label><br>
                        <input type="text" name="username" id="username" class="form-control bg-warning border-white text-dark"><br>
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control bg-warning border-white text-dark"><br>
                        <button type="submit" class="btn btn-dark">Log in</button>
                    </form>
                </div>
            </div>
        </div>
   
<?php
include_once __DIR__ . '/partials/footer.php'
?>