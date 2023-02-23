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
                <h2 class="my-5 text-center">Create new book:</h2>
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
                    <form action="add.php" method="POST" class="mt-3">
                        <div class="row">
                            <div class="col-4 form-group">
                                <label for="book_title">Title:</label><br>
                                <input type="text" id="book_title" name="book_title" class="form-control bg-warning border-white text-dark"><br>
                                <label for="author">Choose an author:</label><br>
                                <?php
                                    $sql = 'SELECT * FROM authors WHERE is_deleted = 0';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                ?>
                                <select required class="p-2 form-control bg-warning border-white text-dark" id="author" name="author">
                                    <option value selected hidden></option>
                                    <?php
                                     while($author = $stmt->fetch()) {?>
                                        <option value="<?=$author['id']?>"><?=$author['name']?> <?=$author['surname']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3 form-group">
                                <label for="publish_year">Publish year:</label><br>
                                <input type="text" id="publish_year" name="publish_year" class="form-control bg-warning border-white text-dark"><br>
                                <label for="pages">Pages:</label><br>
                                <input type="text" id="pages" name="pages" class="form-control bg-warning border-white text-dark">
                            </div>
                            <div class="col-4 form-group">
                                <label for="img">Image:</label><br>
                                <input type="text" id="img" name="img" class="form-control bg-warning border-white text-dark"><br>
                                <label for="category">Choose category:</label><br>
                                <?php
                                    $sql = 'SELECT * FROM categories WHERE is_deleted = 0';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                ?>
                                <select required class="p-2 form-control bg-warning border-white text-dark" id="category" name="category">
                                    <option value selected hidden></option>
                                    <?php
                                        while($category = $stmt->fetch()) {?>
                                            <option value="<?=$category['id']?>"><?=$category['category']?></option>
                                    <?php }?>
                                </select><br>
                            </div>
                            <div class="col-1 mt-5 pt-4">
                                <button class="btn btn-dark">Add</button>
                            </div>               
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="my-5 text-center text-white">Edit or delete the available books:</h2>
            </div>
        </div>
        <?php
            $sql = 'SELECT * FROM books WHERE is_deleted = 0';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $books = $stmt->fetchAll(); 
        ?>                                   
        <div class="row">
            <div class="col-12">
                <?php foreach($books as $book) {?>
                    <div class="border rounded-lg p-3 m-4">
                        <form action="editSubmit.php" method="POST" class="row">
                            <div class="col-4 form-group">
                                <label for="title">Title</label><br>
                                <input type="text" name="title" class="form-control bg-warning border-white text-dark" value="<?=$book['title']?>"><br>
                                <label for="author">Author:</label>
                                <select required class="form-control bg-warning border-white text-dark" id='author_id' name='author_id'>
                                    <?php
                                    $sql = 'SELECT * FROM authors WHERE is_deleted = 0';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();   
                                    while($author = $stmt->fetch()) {?>
                                        <option value="<?=$author['id']?>" <?=$author['id'] == $book['author_id'] ? 'selected' : '' ?>><?=$author['name']?></option>
                                    <?php }?>
                                </select><br> 
                            </div>
                            <div class="col-3 form-group">
                                <label for="publish_year">Year of publishing:</label><br>
                                <input type="text" name="publish_year" class="form-control bg-warning border-white text-dark" value="<?=$book['publish_year']?>"><br>
                                <label for="pages">Pages"</label><br>
                                <input type="text" name="pages" class="form-control bg-warning border-white text-dark" value="<?=$book['pages']?>"><br>
                            </div>
                            <div class="col-4 form-group">
                                <label for="img">Image:</label><br>
                                <input type="text" name="img" class="form-control bg-warning border-white text-dark" value="<?=$book['img']?>"><br>
                                <label for="category">Category:</label>
                                <select required class="form-control bg-warning border-white text-dark" id='category' name='category'>
                                    <?php
                                    $sql = 'SELECT * FROM categories WHERE is_deleted = 0';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();   
                                    while($category = $stmt->fetch()) {?>
                                        <option value="<?=$category['id']?>" <?=$category['id'] == $book['category_id'] ? 'selected' : '' ?>><?=$category['category']?></option>
                                    <?php }?>
                                </select><br>           
                            </div>
                            <div class="col-1  mt-4">
                                <input type="hidden" name="id" value="<?=$book['id']?>">
                                <button class="btn btn-light mt-4 px-4">Edit</button>         
                            </div> 
                        </form>                
                        <div class="col-1 offset-11">
                            <form action="delete.php" method="POST" class="alert-delete">
                                <input type="hidden" name="id" value="<?=$book['id']?>">
                                <button class="btn btn-danger mt-negative" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php } unset($_SESSION['success'])?>
            </div>
        </div>                                
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="sweetalert-delete.js"></script>
    
    