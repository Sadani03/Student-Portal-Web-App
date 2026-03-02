<?php include 'includes/header.php'; ?>
    
<div class="form-container">
    <h1>Register</h1>
    <form action="php/register.php" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" required>
        </div>
        <div class="form-group">
            <label for="program">Program</label>
            <select id="program" name="program" required>
                <option value="">Select Program</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Business Administration">Business Administration</option>
                <option value="Engineering">Engineering</option>
                <option value="Arts">Arts</option>
                <option value="Science">Science</option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password (min 8 characters)</label>
            <input type="password" id="password" name="password" minlength="8" required>
          
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>
<?php include 'includes/footer.php'; ?>