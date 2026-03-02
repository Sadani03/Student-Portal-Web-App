<?php
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
   
    if (empty($email) || empty($password)) {
        die("Please fill in all fields.");
    }
    
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if (!$user) {
        die("Invalid email or password.");
    }
    
    
    if (!password_verify($password, $user['password'])) {
        die("Invalid email or password.");
    }
    
    // Set session 
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    
    // Set cookie if "remember me" was checked
    if (isset($_POST['remember'])) {
        $token = bin2hex(random_bytes(32));
        $expiry = time() + 60 * 60 * 24 * 30; 
        
        $stmt = $pdo->prepare("UPDATE users SET remember_token = ?, token_expiry = ? WHERE id = ?");
        $stmt->execute([$token, date('Y-m-d H:i:s', $expiry), $user['id']]);
        
        setcookie('remember_token', $token, $expiry, '/');
    }
    
    header("Location: ../home.php");
    exit();
}

header("Location: ../login.php");
exit();
?>