<?php

session_start();


require_once 'includes/congfig.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE name = ?";
    $stmt = $conn->prepare($sql);

    
    if ($stmt === false) {
        error_log("Database error: " . $conn->error);
        die("An error occurred. Please try again later.");
    }

    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

   
    if ($user && password_verify($password, $user['password'])) {
       
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id']; 

       
        header('Location: contact-list.php');
        exit;
    } else {
        $error_message = "Invalid username or password. Please try again.";
    }
}