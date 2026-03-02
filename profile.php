<?php 
include 'includes/config.php';
redirectIfNotLoggedIn();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $student_id = trim($_POST['student_id']);
    $program = trim($_POST['program']);
    $city = trim($_POST['city']);
    $email = trim($_POST['email']);
    
    
    if (empty($name) || empty($student_id) || empty($program) || empty($city) || empty($email)) {
        die("Please fill in all fields.");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    
    
    $stmt = $pdo->prepare("SELECT id FROM users WHERE (email = ? OR student_id = ?) AND id != ?");
    $stmt->execute([$email, $student_id, $_SESSION['user_id']]);
    
    if ($stmt->fetch()) {
        die("Email or Student ID already in use by another account.");
    }


    $stmt = $pdo->prepare("UPDATE users SET name = ?, student_id = ?, program = ?, city = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $student_id, $program, $city, $email, $_SESSION['user_id']]);
    $_SESSION['email'] = $email;
    header("Location: profile.php?success=1");
    exit();
}


$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

include 'includes/header.php'; 
?>
<div class="profile-card">
    <h1>Student Profile</h1>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Profile updated successfully!</div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="profile-info">
            <div class="form-group">
                <label for="name">Full Name</label>
                <div class="field-value">
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <div class="field-value">
                    <input type="text" id="student_id" name="student_id" value="<?php echo htmlspecialchars($user['student_id']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <div class="field-value">
                    <select id="program" name="program" required>
                        <option value="Computer Science" <?php echo $user['program'] === 'Computer Science' ? 'selected' : ''; ?>>Computer Science</option>
                        <option value="Business Administration" <?php echo $user['program'] === 'Business Administration' ? 'selected' : ''; ?>>Business Administration</option>
                        <option value="Engineering" <?php echo $user['program'] === 'Engineering' ? 'selected' : ''; ?>>Engineering</option>
                        <option value="Arts" <?php echo $user['program'] === 'Arts' ? 'selected' : ''; ?>>Arts</option>
                        <option value="Science" <?php echo $user['program'] === 'Science' ? 'selected' : ''; ?>>Science</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <div class="field-value">
                    <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($user['city']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="field-value">
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label>Member Since</label>
                <div class="field-value member-since">
                    <?php echo date('F j, Y', strtotime($user['created_at'])); ?>
                </div>
            </div>
        </div>
        <div class="action-buttons">
            <button type="submit" class="btn">Update Profile</button>
        </div>
    </form>
</div>
<?php include 'includes/footer.php'; ?>