<?php
require_once __DIR__ . '/connection/conn.php';
include_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/partials/menu.php';
?>

    <div class="container-fluid bg-warning">
        <div class="row">
            <div class="col-12 mt-2">
                <a href="index.php" class="text-dark"><b>Back to home</b></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <h2 class="text-center mt-5">DASHBOARD</h2>
            </div>
        </div>
        <div class="row mt-4 pb-5">
            <div class="col-3 my-5 pt-5">
                <a href="admin-operations/authors/authors.php">
                    <div class="bg-dark text-warning p-3 rounded mb-5">
                        Authors
                    </div>
                </a>
            </div>
           <div class="col-3 my-5 pt-5">
                <a href="admin-operations/books/books.php">
                    <div class="bg-dark text-warning p-3 rounded mb-5">
                        Books
                    </div>
                </a>
            </div>
            <div class="col-3 my-5 pt-5">
                <a href="admin-operations/category/categories.php">
                    <div class="bg-dark text-warning p-3 rounded mb-5">
                        Categories
                    </div>
                </a>
            </div>
            <div class="col-3 my-5 pt-5">
                <a href="admin-operations/comments/comments.php">
                    <div class="bg-dark text-warning p-3 rounded mb-5">
                        Comments
                    </div>
                </a>
            </div>
        </div>
        <div class="mb-3"></div>
   
    
<?php
include_once __DIR__ . '/partials/footer.php'
?>