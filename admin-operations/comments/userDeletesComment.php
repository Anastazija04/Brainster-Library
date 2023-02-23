<?php
require_once __DIR__ . '/../../connection/conn.php';

$comment_id =  $_POST['comment_id'];
$book_id = $_POST['book_id'];
$sql = 'DELETE FROM comments WHERE id =' . $comment_id . ' LIMIT 1';

$stmt = $pdo->prepare($sql);
$stmt->execute();
if($stmt->rowCount() == 1) {
    header('Location: ../../book.php?id=' . $book_id);
    die();  
} else if($stmt->rowCount() == 0) {
    header('Location: ../../book.php?id=' . $book_id);
    die(); 
}
