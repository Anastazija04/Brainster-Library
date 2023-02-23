<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../connection/conn.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        $_SESSION['error'] = 'Both fields are required';
        header('Location: ../login.php');
        die();
    } else {
        $sql = 'SELECT users.id AS user_id, users.name, users.password, roles.id AS role_id, roles.role FROM users
        JOIN roles ON users.role_id = roles.id 
        WHERE name = :username  
        LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'username' => $username,
        ]);
        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            if(password_verify($password, $user['password'])){
                $_SESSION['username'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['id'] = $user['user_id'];
                header('Location: ../index.php');
                die();
            } 
            else {
                $_SESSION['error'] = 'Wrong username/email and password combination.';
                header('Location: ../login.php');
                die();
            }
        } else {
            $_SESSION['error'] = 'Wrong credentials!';
            header('Location: ../login.php');
            die();
        }
    }
} else {
    header('Location: ../index.php');
    die();
}