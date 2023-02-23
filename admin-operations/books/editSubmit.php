<?php
require_once __DIR__ . '/../../connection/conn.php';
include_once __DIR__ . '/../../partials/header.php';

$id = $_POST['id'];
$newBookTitle = $_POST['title'];
$newAuthor = $_POST['author_id'];
$newPublishYear = $_POST['publish_year'];
$newPages = $_POST['pages'];
$newImg = $_POST['img'];
$newCategory = $_POST['category'];

$sql = "UPDATE books SET title = '$newBookTitle', author_id =  '$newAuthor', publish_year = '$newPublishYear', pages = '$newPages', img = '$newImg', category_id = '$newCategory' WHERE id = $id LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->rowCount() == 1) {
    header('Location: books.php');
    die();  
} else if($stmt->rowCount() == 0) {
    header('Location: books.php');
    die(); 
}