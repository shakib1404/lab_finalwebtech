<?php

require_once 'includes/congfig.php'; 


$email = 'admin@gmail.com'; 
$password = '123456'; 


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users (email, password) VALUES (?, ?)";


$stmt = $conn->prepare($sql);


if ($stmt === false) {
    echo "Error preparing the SQL query: " . $conn->error;
    exit;
}


$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "Demo user inserted successfully!";
} else {
    echo "Error inserting demo user: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
