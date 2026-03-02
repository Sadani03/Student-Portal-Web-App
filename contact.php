<?php 
include 'includes/config.php';
redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $rating = $_POST['rating'];
    
    $stmt = $pdo->prepare("INSERT INTO contacts (user_id, message, rating) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $message, $rating]);
    
    echo "<script>alert('Thank you for your feedback!'); window.location.href = 'profile.php';</script>";
    exit();
}

include 'includes/header.php'; 
?>
    <div class="form-container">
        <h1>Contact Us</h1>
        <form method="POST">
            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
                <label>Rating</label>
                <div class="rating">
                    <input type="radio" id="star1" name="rating" value="1" required>
                    <label for="star1">★</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">★</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">★</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">★</label>
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">★</label>
                </div>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
<?php include 'includes/footer.php'; ?>