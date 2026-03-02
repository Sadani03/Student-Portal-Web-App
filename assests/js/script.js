document.addEventListener('DOMContentLoaded', function() {
    // Dark mode toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    
    const sunIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="5"></circle>
        <line x1="12" y1="1" x2="12" y2="3"></line>
        <line x1="12" y1="21" x2="12" y2="23"></line>
        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
        <line x1="1" y1="12" x2="3" y2="12"></line>
        <line x1="21" y1="12" x2="23" y2="12"></line>
        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
    </svg>`;
    
    const moonIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>`;
    
    // Setting initial theme and icon
    const currentTheme = localStorage.getItem('theme') || (prefersDarkScheme.matches ? 'dark' : 'light');
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
        darkModeToggle.innerHTML = sunIcon;
    } else {
        darkModeToggle.innerHTML = moonIcon;
    }
    
    
    
    darkModeToggle.addEventListener('click', function() {
        const isDark = document.body.classList.toggle('dark-mode');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        darkModeToggle.innerHTML = isDark ? sunIcon : moonIcon;
    });


    
    // Password toggle 
    const passwordToggles = document.querySelectorAll('.password-toggle input[type="checkbox"]');
    passwordToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const passwordInput = this.closest('.form-group').querySelector('input[type="password"]');
            if (!passwordInput) return;
            
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    });
    
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const inputs = this.querySelectorAll('input[required], textarea[required], select[required]');
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = '';
                    
                    // Email validation
                    if (input.type === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(input.value)) {
                            isValid = false;
                            input.style.borderColor = 'red';
                        }
                    }
                    
                    // Password validation (for registration form)
                    if (input.id === 'password' && input.value.length < 8) {
                        isValid = false;
                        input.style.borderColor = 'red';
                        alert('Password must be at least 8 characters long');
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields correctly.');
            }
        });
    });
    
    // Rating stars 
    const ratingStars = document.querySelectorAll('.rating input');
    ratingStars.forEach(star => {
        star.addEventListener('change', function() {
            const ratingValue = parseInt(this.value);
            const labels = this.closest('.rating').querySelectorAll('label');
        
            labels.forEach((label, index) => {
           
              if (index < ratingValue) {
                label.style.color = '#f1c40f';
              } else {
                label.style.color = '#ddd';
              }
            });
        });
    });

});