<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../connection/conn.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required!"; 
        header('Location: ../signup.php');
        die();
    } else if (strlen($username) < 2) {
        $_SESSION['error'] = "Username must be at least three characters."; 
        header('Location: ../signup.php');
        die();
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "The email is in invalid format."; 
        header('Location: ../signup.php');
        die();
    } else if(!preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@', $password) || !preg_match('@[0-9]@', $password) || !preg_match('@[^\w]@', $password) || strlen($password) < 8) {
        $_SESSION['error'] = "Password should be at least 8 characters, one uppercase letter, one number, and one special character."; 
        header('Location: ../signup.php');
        die();
    } else {
        $passHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users ( name, email, password) VALUES ( :name, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $username,
            'email' => $email,
            'password' => $passHash,
        ]);

        if($stmt->rowCount() == 1) {
            $_SESSION['success'] = "<p>User successfully registered!</p>
            <p>Please log in!</p>"; 
            header('Location: ../login.php');
            die();
        }
    } 
}