<?php

require_once __DIR__ . '/../../connection/conn.php';
include_once __DIR__ . '/../headerForAdmin.php';
include_once __DIR__ . '/../menuForAdmin.php';
?>
<div class="container-fluid bg-warning">
    <div class="row">
        <div class="col-12 mt-2">
            <a href="./../../adminDashboard.php" class="text-dark"><b>Dashboard</b></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="my-5 text-center">Add new category</h2>
            <?php if(isset($_SESSION['error'])) { ?>
                <p class="alert text-danger text-center">
                    <?= $_SESSION['error']?>
                </p>
            <?php } else if(isset($_SESSION['success'])) { ?>
                    <p class="alert text-success text-center">
                        <?= $_SESSION['success']?>
                    </p>
            <?php } unset($_SESSION['error'])?>
            <div class="border rounded-lg p-3 m-5">
                <form action="addCategory.php" method="POST" class="">
                    <div class="row">
                        <div class="col-11 form-group">
                            <label for="titleCategory">Title of the category:</label><br>
                            <input type="text" id="titleCategory" name="titleCategory" class="form-control bg-warning border-white text-dark">
                        </div>
                        <div class="col-1">
                            <button class="btn btn-dark mt-4">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="my-5 text-center text-white">Edit or delete the available categories:</h2>
        </div>
    </div>
     <?php
        $sql = 'SELECT * FROM categories WHERE is_deleted = 0';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    ?>
    <div class="row">
        <div class="col-12">
            <?php while($row = $stmt->fetch()) {?>
                <div class="border rounded-lg p-3 m-5">
                    <form action="editSubmit.php" method="POST" class="row mt-2">
                        <div class="col-11 form-group mt-3">
                            <input type="text" id="titleCategory" name="titleCategory" class="form-control bg-warning border-white text-dark"  value="<?=$row['category']?>">
                        </div>
                        <div class="col-1">
                            <input type="hidden" name="id" value="<?=$row['id']?>" >
                            <button class="btn btn-light px-4">Edit</button>
                        </div>
                    </form>
                    <div class="col-1 offset-11">
                        <form action="deleteCategory.php" method="POST">
                            <input type="hidden" name="id" value="<?=$row['id']?>" >
                            <button class="btn btn-danger mt-negative1"> Delete</button>
                        </form>
                    </div>
                </div>
            <?php } unset($_SESSION['success'])?>
        </div>   
    </div>
</div>


            
            
       