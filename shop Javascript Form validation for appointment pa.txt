// Form validation for appointment page
document.addEventListener('DOMContentLoaded', function() {
    const appointmentForm = document.getElementById('appointment-form');
    
    if (appointmentForm) {
        appointmentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const date = document.getElementById('date').value;
            
            if (!name || !email || !phone || !date) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }
            
            // Phone validation (simple check for at least 10 digits)
            const phoneDigits = phone.replace(/\D/g, '');
            if (phoneDigits.length < 10) {
                alert('Please enter a valid phone number with at least 10 digits.');
                return;
            }
            
            // If all validation passes
            alert('Thank you for your appointment request! We will contact you shortly to confirm.');
            appointmentForm.reset();
            
            // In a real implementation, you would send the form data to a server here
            // fetch('/submit-appointment', {
            //     method: 'POST',
            //     body: new FormData(appointmentForm)
            // }).then(response => {
            //     // Handle response
            // });
        });
    }
    
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const navMenu = document.querySelector('nav ul');
    
    if (mobileMenuBtn && navMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            navMenu.classList.toggle('show');
        });
    }
    
    // Service card hover effect
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
});