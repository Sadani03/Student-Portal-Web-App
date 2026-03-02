<?php
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $student_id = trim($_POST['student_id']);
    $program = trim($_POST['program']);
    $city = trim($_POST['city']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate inputs
    if (empty($name) || empty($student_id) || empty($program) || empty($city) || 
        empty($email) || empty($password) || empty($confirm_password)) {
        die("Please fill in all fields.");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long.");
    }
    
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }
    
   
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR student_id = ?");
    $stmt->execute([$email, $student_id]);
    
    if ($stmt->fetch()) {
        die("Email or Student ID already registered.");
    }
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    
    $stmt = $pdo->prepare("INSERT INTO users (name, student_id, program, city, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $student_id, $program, $city, $email, $hashed_password]);
    
  
    $user_id = $pdo->lastInsertId();
    
    // Set session and redirect
    $_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $email;
    
    header("Location: ../home.php");
    exit();
}

header("Location: ../register.php");
exit();
?>