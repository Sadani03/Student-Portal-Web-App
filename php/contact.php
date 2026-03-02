<?php
include '../includes/config.php';
redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);
    $rating = (int)$_POST['rating'];
    
    
    if (empty($message)) {
        die("Please enter a message.");
    }
    
    if ($rating < 1 || $rating > 5) {
        die("Please select a valid rating.");
    }
    
    
    $stmt = $pdo->prepare("INSERT INTO contacts (user_id, message, rating) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $message, $rating]);
    
    header("Location: ../profile.php?success=1");
    exit();
}

header("Location: ../contact.php");
exit();
?>