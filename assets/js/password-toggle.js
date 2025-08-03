// Password toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    // Function to toggle password visibility
    function togglePassword(inputId, buttonId, iconId) {
        const toggleButton = document.getElementById(buttonId);
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);
        
        if (toggleButton && passwordInput && eyeIcon) {
            toggleButton.addEventListener('click', function() {
                // Check current password type
                if (passwordInput.type === 'password') {
                    // Show password
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    // Hide password
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
        }
    }
    
    // Set up password toggles for both fields
    togglePassword('password', 'togglePassword', 'eyeIcon');
    togglePassword('confirm_password', 'toggleConfirmPassword', 'confirmEyeIcon');
}); 