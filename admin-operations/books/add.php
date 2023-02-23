<?php
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once __DIR__ . '/../../connection/conn.php';

        $book_title = $_POST['book_title'];
        $author = $_POST['author'];
        $publish_year = $_POST['publish_year'];
        $pages = $_POST['pages'];
        $img = $_POST['img'];
        $category = $_POST['category'];

        if(empty($book_title) || empty($author) || empty($publish_year) || empty($pages) || empty($img) || empty($category)) {
            $_SESSION['error'] = 'All fields are required!';
            header('Location: books.php');
            die();
        } else if(!is_numeric($publish_year) || !is_numeric($pages)) {
            $_SESSION['error'] = 'Both "publish year" and "pages" fields needs to be numbers!';
            header('Location: books.php');
            die();
        } else if(filter_var($img, FILTER_VALIDATE_URL) === false) {
            $_SESSION['error'] = 'The image needs to be valid url!';
            header('Location: books.php');
            die();
        } else {
            $sql = "INSERT INTO books ( title, author_id, publish_year, pages, img, category_id) VALUES (:title, :author_id, :publish_year, :pages, :img, :category_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'title'=> $book_title,
                'author_id' => $author,
                'publish_year' => $publish_year,
                'pages' => $pages,
                'img' => $img, 
                'category_id' => $category,
            ]);
            $_SESSION['success'] = 'Book successfully created!';
            header('Location: books.php');
            die();
        }
    }
