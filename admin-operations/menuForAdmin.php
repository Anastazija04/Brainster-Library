<nav class="navbar navbar-dark bg-dark justify-content-between p-3">
        <a class="navbar-brand text-warning"><b>Brainster Library</b></a>
        <div class="ml-auto float-right">
            <?php
            if(isset($_SESSION['username'])) { ?>
                <a class="btn btn-warning" href="./../../logout.php">Logout</a>
            <?php } else { ?>
            <a class="btn btn-warning" href="./../../login.php">Login</a>
            <a class="btn btn-warning" href="./../../signup.php">Sign up</a>
            <?php } ?>
        </div>
    </nav>