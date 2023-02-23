<?php

require_once __DIR__ . '/../../connection/conn.php';

$id =  $_POST['id'];
$sql = "UPDATE categories SET is_deleted = 1 WHERE id = $id LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();
if($stmt->rowCount() == 1) {
    header('Location: categories.php');
    die();  
} else if($stmt->rowCount() == 0) {
    header('Location: categories.php');
    die(); 
}