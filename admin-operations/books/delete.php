<?php
session_start();
require_once __DIR__ . '/../../connection/conn.php';

$id =  $_POST['id'];
$sql = "UPDATE books SET is_deleted = 1 WHERE id = $id LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();
if($stmt->rowCount() == 1) {
    header('Location: books.php');
    die();  
} else if($stmt->rowCount() == 0) {
    header('Location: books.php');
    die(); 
}