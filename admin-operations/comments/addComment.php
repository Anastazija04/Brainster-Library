<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../../connection/conn.php';

    $comment = $_POST['comment'];
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user_id'];

    if(empty($comment)) {
            $_SESSION['error'] = 'The field cannot be empty!';
            header('Location: ../../book.php?id=' . $book_id);
            die();
    } else {
        $sql = "INSERT INTO comments (user_id, book_id, comment) VALUES (:user_id, :book_id, :comment)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'comment' => $comment,    
        ]);
        $_SESSION['success'] = 'The comment will be public once approved.';
        header('Location: ../../book.php?id=' . $book_id);
        die();
    }
    
}