<?php
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once __DIR__ . '/../../connection/conn.php';

        $name = $_POST['authorName'];
        $surname = $_POST['authorSurname'];
        $bio = $_POST['authorBio'];

        if(empty($name) || empty($surname) || empty($bio)) {
            $_SESSION['error'] = 'All fields are required!';
            header('Location: authors.php');
            die();
        } else if(strlen($bio) < 20) {
            $_SESSION['error'] = 'The biography must be longer than 20 characters.';
            header('Location: authors.php');
            die();
        } else {
            $sql = "INSERT INTO authors (name, surname, bio) VALUES (:name, :surname, :bio)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'surname'=> $surname,
                'bio' => $bio
            ]);
            $_SESSION['success'] = 'Author successfully created!';
            header('Location: authors.php');
            die();
        }

        
    }
