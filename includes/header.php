<?php 
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="assests/js/script.js" defer></script>
</head>
<body>
    <header>
        <div class="container nav-container">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                </svg>
                Student Portal
            </div>
            <nav>
                <div class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <?php if (isLoggedIn()): ?>
                        
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="php/logout.php" class="logout-btn">Logout</a></li>
                    <?php else: ?>
                        <li><a href="register.php" class="register-btn">Register</a></li>
                        <li><a href="login.php" class="login-btn">Login</a></li>
                    <?php endif; ?>
                </div>
            </nav>
            <div class="header-right">
                <?php if (isLoggedIn()): ?>
                    <a href="profile.php" class="profile-icon" title="Your Profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </a>
                <?php endif; ?>
                <div class="dark-mode-toggle">
                    <button id="darkModeToggle" type="button" title="Toggle theme" aria-label="Toggle theme"></button>
                </div>
            </div>
        </div>
    </header>
    <main class="container">