<?php

session_start();


require_once 'includes/congfig.php';  


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

   
    if ($stmt === false) {
        echo "Error preparing the SQL query: " . $conn->error;
        exit;
    }

    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

  
    if ($user) {
        echo "Stored Hash: " . $user['password'] . "<br>";  
        echo "Submitted Password: " . $password . "<br>";  

       
        if (password_verify($password, $user['password'])) {   
            
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;

            
            header('Location: contact-list.php');
            exit;
        } else {
          
            $error_message = "Invalid password. Please try again.";
        }
    } else {
        
        $error_message = "No user found with that email. Please try again.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<main>
    <h1>Admin Login</h1>
    <p>Please enter your credentials to log in:</p>

    <?php
    
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

   
    <form action="admin.php" method="POST">  
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="admin@gmail.com" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="123456" required>

        <button type="submit">Login</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>
