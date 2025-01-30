<?php

require_once 'includes/congfig.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    
    $sql = "INSERT INTO contact_messages (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        
        echo "Message sent successfully! Thank you for contacting us.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>
