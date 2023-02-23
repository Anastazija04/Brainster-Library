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
            <h2 class="my-5 text-center">Create new author:</h2>
            <?php if(isset($_SESSION['error'])) { ?>
                    <p class="alert text-danger text-center">
                        <?= $_SESSION['error']?>
                    </p>
                <?php } else if(isset($_SESSION['success'])) { ?>
                    <p class="alert text-success text-center">
                        <?= $_SESSION['success']?>
                    </p>
                <?php } unset($_SESSION['error'])?>
            <div class="border rounded-lg p-3 m-4"> 
                <form action="addAuthor.php" method="POST" class="mt-3">
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="authorName">Name of the author:</label><br>
                            <input type="text" id="authorName" name="authorName" class="form-control bg-warning border-white text-dark">
                            <label for="authorSurname">Surname of the author:</label><br>
                            <input type="text" id="authorSurname" name="authorSurname" class="form-control bg-warning border-white text-dark">
                        </div>
                        <div class="col-7 form-group">
                            <label for="authorBio">Short bio:</label><br>
                            <textarea name="authorBio" id="authorBio" class="form-control bg-warning border-white text-dark" cols="25" rows="4"></textarea>
                        </div>
                        <div class="col-1 mt-5">
                            <button class="btn btn-dark mt-2">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="my-5 text-center text-white">Edit or delete the available authors:</h2>
        </div>
    </div>
    <?php
        $sql = 'SELECT * FROM authors WHERE is_deleted = 0';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    ?>
    <div class="row">
        <div class="col-12">
            <?php while($authors = $stmt->fetch()) {?>
                <div class="border rounded-lg p-3 m-4">
                    <form action="editSubmit.php" method="POST" class="row">
                        <div class="col-4 form-group">
                            <label>Author name:</label><br>
                            <input type="text" class="form-control bg-warning border-white text-dark" id="authorName" name="authorName" value="<?=$authors['name']?>"><br>
                            <label>Author surname:</label><br>
                            <input type="text" class="form-control bg-warning border-white text-dark" id="authorSurname" name="authorSurname" value="<?=$authors['surname']?>">
                        </div>
                        <div class="col-7 form-group">
                            <label>Author bio:</label><br>
                            <textarea name="authorBio" class="form-control bg-warning border-white text-dark" id="authorBio" class="form-control" cols="25" rows="5"><?=$authors['bio']?></textarea>
                        </div>
                        <div class="col-1 mt-4">
                            <input type="hidden" name="id" value="<?=$authors['id']?>" >
                            <button class="btn btn-light mt-4 px-4">Edit</button>
                        </div>
                    </form>
                    <div class="col-1 offset-11">
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?=$authors['id']?>">
                            <button class="btn btn-danger mt-negative">Delete</button>
                        </form>
                    </div> 
                </div>
            <?php } unset($_SESSION['success'])?> 
        </div>
    </div>
</div>        
                
                
                
            
            

    
        
            
            
            
            
            
            
        
      