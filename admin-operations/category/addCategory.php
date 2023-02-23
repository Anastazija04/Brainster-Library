<?php
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once __DIR__ . '/../../connection/conn.php';

        $title = $_POST['titleCategory'];

        if(empty($title)) {
            $_SESSION['error'] = 'The field is required!';
            header('Location: categories.php');
            die();
        } else {
            $sql = "INSERT INTO categories (category) VALUES (:category)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'category' => $title,
            ]);
            $_SESSION['success'] = 'Category successfully added!';
            header('Location: categories.php');
            die();
        }
    }
