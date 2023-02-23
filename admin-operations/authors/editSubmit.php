<?php
require_once __DIR__ . '/../../connection/conn.php';
include_once __DIR__ . '/../../partials/header.php';

$id =  $_POST['id'];
$newName = $_POST['authorName'];
$newSurname = $_POST['authorSurname'];
$newBio = $_POST['authorBio'];

$sql = "UPDATE authors SET name = '$newName', surname = '$newSurname', bio = '$newBio' WHERE id = $id LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();
if($stmt->rowCount() == 1) {
    header('Location: authors.php');
    die();  
} else if($stmt->rowCount() == 0) {
    header('Location: authors.php');
    die(); 
}