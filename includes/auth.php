<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once 'congfig.php'; 


function check_login() {
    if (isset($_SESSION['user_id'])) {
        return true; 
    }
    return false;  
}


function login($email, $password) {
    global $conn;

    
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    
    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            return true;  
        }
    }
    return false;  
}


function logout() {
    
    session_destroy();
    header("Location: index.php");  
    exit();
}
?>
