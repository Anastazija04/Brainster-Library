<?php 
require_once __DIR__ . '/connection/conn.php';
include_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/partials/menu.php';

$id = $_GET['id'];
?>

<div class="container-fluid bg-warning">
    <div class="row">
        <div class="col-12 mt-2">
            <a href="./index.php" class="text-dark"><b>Home</b></a>
        </div>
    </div>
    <?php
        $sql = 'SELECT books.id, books.title, books.img, books.pages, books.publish_year, authors.name, authors.surname, authors.bio, categories.category 
        FROM books 
        JOIN authors ON books.author_id = authors.id 
        JOIN categories ON books.category_id = categories.id
        WHERE books.id =' . $id ;

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $book = $stmt->fetchAll();
                
        foreach($book as $book) { 
    ?>
    <div class="row my-5">
        <div class="col-8">
            <h2 class="ml-3 mb-4"><?=$book['title']?></h2>
            <div class="row">
                <div class="col-6 offset-1 border border-dark rounded p-2" data-aos="flip-right">
                    <img src="<?=$book['img']?>" class="w-100 rounded" alt="..." style="height:600px">
                </div>
                <div class="col-4 pt-4 text-center">
                    <span class="pt-3">Author:</span>
                    <p><b><?=$book['name']?> <?=$book['surname']?></b></p>
                    <span>Year published: </span>
                    <p><b><?=$book['publish_year']?></b></p>
                    <span>Num. of pages: </span>
                    <p><b><?=$book['pages']?></b></p>
                    <span>Category: </span>
                    <p><b><?=$book['category']?></b></p>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <p class="text-center p-3"><?=$book['bio']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if(!isset($_SESSION['username'])) { ?>

        <div class="col-3  ml-5 p-3 text-center border rounded">
            <div class="mt-3">
            <h4>Kindly register</h4>
            <p>so you can enjoy our library at the fullest</p>
            </div>
            <div class="mt-3 pr-3 text-center">
                <span>*Once you are registered</span>
                <span>there are unlimited options for leaving your personal notes and keeping track of your progress.</span>
            </div>
            <div class="mt-3 pt-1">
                <h4 class="mt-3 pb-4">Our best-sellers of the month!</h4>
                <div class="w-50 m-auto" data-aos="flip-left">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/417WxdBd9NL._SX331_BO1,204,203,200_.jpg" style="height:200px" alt="">
                </div>
                <div class="w-50 m-auto pt-3" data-aos="flip-left">
                    <img src="https://sharewareonsale.com/wp-content/uploads/2016/03/w_webd07c8-692x1024.jpg" style="height:200px"  alt="">
                </div>
            </div>
        </div>
        <?php }?>

        <?php if(isset($_SESSION['username'])) { ?>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h4>Write your personal notes:</h4>
                    <textarea name="comment" id="noteInput" class="form-control border border-dark bg-warning text-dark" cols="3" rows="3"></textarea>
                    <button id="addNoteBtn" class="btn btn-dark text-warning mt-4">Add note</button>
                </div>
            </div>
            
            <div class="row">
                <div id="notesContainer" class="col-12 mt-3"></div>
            </div>
        </div>
        <?php
            $sql = 'SELECT comments.id, comments.user_id, comments.book_id, comments.approved, comments.comment
            FROM comments
            JOIN users ON comments.user_id = users.id
            JOIN books ON comments.book_id = books.id
            WHERE comments.book_id = '. $id .' AND user_id = '. $_SESSION['id'];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $comments = $stmt->fetchAll();
            if(!$comments){
        ?> 
    </div>
            
    <div class="row">
        <div class="col-6">
            <form method="POST" action="./admin-operations/comments/addComment.php" class="form-group">
                <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>">
                <input type="hidden" name="book_id" value="<?=$_GET['id']?>">
                <h4>Leave a comment:</h4>
                <?php if(isset($_SESSION['error'])) { ?>
                    <span class="alert text-danger">
                        <?= $_SESSION['error']?>
                    </span>
                <?php } unset($_SESSION['error'])?>
                <textarea name="comment" id="comment" class="form-control bg-warning border border-dark text-dark" cols="3" rows="3"></textarea><br>
                <button class="btn btn-dark text-warning">Save</button>
            </form>
        </div>
        <?php } else {?>
        <div class="col-6">
            <h4>Your comment:</h4>
            <?php foreach($comments as $comment) { ?>
            <div class="border rounded border-dark text-dark p-3 p-3 my-2">
                <p class="overflow"><?=$comment['comment']?></p>                   
            </div> 
            <form action="./admin-operations/comments/userDeletesComment.php" method="POST">
                <input type="hidden" name="book_id" value="<?=$_GET['id']?>">
                <input type="hidden" name="comment_id" value="<?=$comment['id']?>">
                <?php if(isset($_SESSION['success'])) { ?>
                    <span class="alert text-dark">
                        <?= $_SESSION['success']?>
                    </span><br>
                <?php } unset($_SESSION['success'])?>
                <button class="btn btn-dark text-warning mt-2">Delete</button>
            </form>
            <?php } ?>
        </div>
        <?php } ?>  
    <?php } ?>
        <?php
            $sql = 'SELECT comments.id, comments.user_id, comments.book_id, comments.approved, comments.comment
            FROM comments
            JOIN users ON comments.user_id = users.id
            JOIN books ON comments.book_id = books.id
            WHERE comments.approved = 1 AND comments.book_id = ' . $id;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $comments = $stmt->fetchAll();
        ?>
        <div class="col-6 mb-3">
            <h4>Comments:</h4>
            <div class="col-12 border rounded border-dark text-dark p-2 my-2 ">
                <?php foreach($comments as $comment) { 
                if($comment['book_id'] == $id) { ?>
                    <div class=" border rounded border-warning m-2 p-1 ">
                           <p class="overflow"><?=$comment['comment']?></p>
                    </div>
                <?php }  
                } ?>
            </div>
        </div>
    </div>
    <?php
        include_once __DIR__ . '/partials/footer.php';
    ?>
</div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="./notes/ajax-notes.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>