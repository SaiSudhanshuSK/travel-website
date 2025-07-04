<?php
// connect.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Replace with your actual database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you're handling a form with 'name' and 'email' fields
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;

    if ($name && $email) {
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Name and email are required.";
    }

    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>
