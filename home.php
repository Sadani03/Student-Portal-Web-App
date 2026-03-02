<?php include 'includes/header.php'; ?>

<section class="hero-section text-center">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Student Portal!</h1>
        <p class="lead">Our students can now register, login, update their profile, and contact administrators through this portal.</p>
    </div>
</section>


<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="assests/images/slide1.jpg" alt="Students studying">
    </div>

    <div class="mySlides fade">
        <img src="assests/images/slide2.jpg" alt="Campus building">
    </div>

    <div class="mySlides fade">
        <img src="assests/images/slide3.jpg" alt="Graduation">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    <div class="dot-container">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
</div>

<section class="quick-actions">
    <?php if (isLoggedIn()): ?>
        <div class="profile-card">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <a href="profile.php" class="btn">Your Profile</a>
                <a href="contact.php" class="btn">Contact Us</a>
            </div>
        </div>
    <?php else: ?>
        <div class="profile-card text-center">
            <h2>Get Started</h2>
            <p>Please register or login to access all features.</p>
            <div class="action-buttons">
                <a href="register.php" class="btn">Register</a>
                <a href="login.php" class="btn btn-outline">Login</a>
            </div>
        </div>
    <?php endif; ?>
</section>

<script>
// For Slideshow 
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
}

    function currentSlide(n) {
    showSlides(slideIndex = n);
}

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
  
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
  
    for (i = 0; i < slides.length; i++) {
     slides[i].style.display = "none";  
  }
  
    for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" active", "");
  }
  
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}
    setInterval(function() {
      plusSlides(1);
}, 5000);
</script>

<?php include 'includes/footer.php'; ?>