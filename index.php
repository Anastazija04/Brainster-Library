<?php
    require_once __DIR__ . '/connection/conn.php';

    $sqlCategories = "SELECT * FROM categories WHERE is_deleted = 0";
    $stmtCategories = $pdo->prepare($sqlCategories);
    $stmtCategories->execute();

    include_once __DIR__ . '/partials/header.php';
    include_once __DIR__ . '/partials/menu.php';
?>
<div class="container-fluid bg-warning">
    <?php
         if(isset($_SESSION['role'])) { 
            if($_SESSION['role'] == 'admin') {?>
              <div class="row">
                 <div class="col-1 offset-11 py-2">
                     <a class="text-dark" href="./adminDashboard.php"><b>Dashboard</b></a>
                 </div>
             </div> 
        <?php 
            } 
        }
    ?>
    <div class="row bg-image pt-3">
        <div class="col-12 text-center mt-5 pt-5">
             <h2 class="ml1 mt-5 text-warning">
                <span class="text-wrapper">
                    <span class="line line1"></span>
                    <span class="letters">BRAINSTER</span>
                    <span class="line line2"></span>
                </span>
            </h2>
            <h2 class="ml1 text-warning">
                <span class="text-wrapper">
                    <span class="line line1"></span>
                    <span class="letters">LIBRARY</span>
                    <span class="line line2"></span>
                </span>
            </h2>
            <h4 class="ml1 text-warning">
                <span class="text-wrapper">
                    <span class="line line1"></span>
                    <span class="letters">Learn through creativity.</span>
                    <span class="line line2"></span>
                </span>
            </h4>
        </div>
    </div>
    <div class="row p-5 mb-5">
        <div class="col-2">
            <h4 class="mb-3">Categories:</h4>
            <div class="">
                <?php while($row = $stmtCategories->fetch()) { ?>
                    <div class="mb-2" data-aos="flip-up">
                        <input type="checkbox" id="checkbox-<?=$row['category']?>" class="category-checkbox" value="<?=$row['category']?>">
                        <label for="checkbox-<?=$row['category']?>"><?=$row['category']?></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-12 d-inline-flex flex-wrap">
            <?php 
                $sql = 'SELECT books.id AS book_id, books.title, books.img, books.pages, books.publish_year, authors.name, authors.surname, authors.bio, categories.category  
                FROM books 
                JOIN authors ON books.author_id = authors.id 
                JOIN categories ON books.category_id = categories.id
                WHERE books.is_deleted = 0';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $books = $stmt->fetchAll();
                foreach($books as $book) { ?>
                
                <div class="m-4 book-card " data-category="<?=$book['category']?>">
                    <a href="book.php?id=<?=$book['book_id']?>">
                        <div class="card p-3 bg-dark" style="width: 18rem;height:100%">
                            <div class="w-50 m-auto grow">
                                <img src="<?=$book['img']?>" class="rounded-circle w-100" alt="..." style="height:144px;">
                            </div>
                            <div class="mt-3">
                                <h6 class="text-white">Title: <?=$book['title']?></h6>
                                <h6 class="text-white">Author: <?=$book['name']?> <?=$book['surname']?></h6>
                                <h6 class="text-white">Category: <?=$book['category']?></h6>    
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            </div>
            </div>
         </div>
    </div>


<?php
include_once __DIR__ . '/partials/footer.php'
?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="js/indexScript.js"></script>
</div>