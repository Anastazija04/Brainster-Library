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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="my-5">Comments waiting for approval:</h3>
            </div>
        </div>
        <?php 
        $sql = 'SELECT comments.id AS comment_id, users.name, books.title, comments.approved, comments.comment
        FROM comments 
        JOIN users ON comments.user_id = users.id
        JOIN books ON comments.book_id = books.id
        WHERE approved = 0';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $pendingComments = $stmt->fetchAll();
        ?>
        <div class="row">
            <div class="col-12">
                <?php foreach($pendingComments as $pending) {?>
                <div class="row m-2">
                    <div class="border rounded-lg p-3 col-10">
                        <p><b>Comment made by:</b> <?=$pending['name']?></p>
                        <p><b>For the book:</b> <?=$pending['title']?></p>
                        <p><b>Comment:</b> <?=$pending['comment']?></p>
                        
                    </div>
                    <div class="col-2">
                        <form action="pendingComment.php" method="POST">
                            <input type="hidden" name="id" value="<?=$pending['comment_id']?>">
                            <button class="btn btn-dark mt-5">Approve</button>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div> 
        <div class="row">
            <div class="col-12">
                <h3 class="my-5">Approved comments:</h3>
            </div>
        </div>  
        <?php 
        $sql = 'SELECT comments.id AS comment_id, users.name, books.title, comments.approved, comments.comment
        FROM comments 
        JOIN users ON comments.user_id = users.id
        JOIN books ON comments.book_id = books.id
        WHERE approved = 1';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $approvedComments = $stmt->fetchAll();
        ?>
        <div class="row">
            <div class="col-12">
                <?php foreach($approvedComments as $approved) {?>
                <div class="row m-2">
                    <div class="border rounded-lg p-3 col-10">
                        <p><b>Comment made by:</b> <?=$approved['name']?></p>
                        <p><b>For the book:</b> <?=$approved['title']?></p>
                        <p><b>Comment:</b> <?=$approved['comment']?></p>
                    </div>
                    <div class="col-2">
                        <form action="denyComment.php" method="POST">
                            <input type="hidden" name="id" value="<?=$approved['comment_id']?>">
                            <button class="btn btn-dark mt-5">Deny</button>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
         </div> 
    </div>
</div>