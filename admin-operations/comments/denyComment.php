<?php 
session_start();
require_once __DIR__ . '/../../connection/conn.php';

$id =  $_POST['id'];
$sql = "UPDATE comments SET approved = 0 WHERE id = $id LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();
if($stmt->rowCount() == 1) {
    header('Location: comments.php');
    die();  
} else if($stmt->rowCount() == 0) {
    header('Location: comments.php');
    die(); 
}