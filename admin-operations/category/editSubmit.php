<?php

require_once __DIR__ . '/../../connection/conn.php';
include_once __DIR__ . '/../../partials/header.php';

$id =  $_POST['id'];
$newCategory = $_POST['titleCategory'];
$sql = "UPDATE categories SET category = '$newCategory' WHERE id = $id LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();
if($stmt->rowCount() == 1) {
    header('Location: categories.php');
    die();  
} else if($stmt->rowCount() == 0) {
    header('Location: categories.php');
    die(); 
}

