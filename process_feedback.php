<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $feedback = trim(filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING));
    $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT, [
        'options' => [
            'default' => 0,
            'min_range' => 0,
            'max_range' => 5
        ]
    ]);
    
    // Generate a random avatar color
    $colors = ['#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#9b59b6', '#1abc9c'];
    $avatarColor = $colors[array_rand($colors)];

    // Prepare and execute the statement
    $stmt = $conn->prepare("INSERT INTO feedbacks (name, feedback, rating, avatar_color) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $feedback, $rating, $avatarColor);

    if ($stmt->execute()) {
        header("Location: index.php?feedback=success");
    } else {
        header("Location: index.php?feedback=error");
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>