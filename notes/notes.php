<?php
session_start();

require_once __DIR__ . '/../connection/conn.php';

if(isset($_POST['add'])){
$addNote = "INSERT INTO notes(note,user_id,book_id) VALUES(:note,:user_id,:book_id)";
$stmt = $pdo->prepare($addNote);
$stmt->bindParam(':note',$_POST['inputValue']);
$stmt->bindParam(':user_id', $_SESSION['id']);
$stmt->bindParam(':book_id', $_POST['bookId']);
$stmt->execute();
}

if(isset($_POST['delete'])){
$deleteNote = "DELETE FROM notes WHERE id=".$_POST['deleteId'];
$stmt = $pdo->prepare($deleteNote);
$stmt->execute();
}

if(isset($_POST['edit'])){
$editNote = "UPDATE notes SET note = :note WHERE id = :id";
$stmt = $pdo->prepare($editNote);
$stmt->bindParam(':note', $_POST['editInput']);
$stmt->bindParam(':id', $_POST['editId']);
$stmt->execute();
}

$notesSql = 'SELECT * FROM notes WHERE book_id = :id AND user_id = :user';
$stmt = $pdo->prepare($notesSql);
$stmt->bindParam(':id', $_POST['bookId']);
$stmt->bindParam(':user', $_SESSION['id']);
$stmt->execute();
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
