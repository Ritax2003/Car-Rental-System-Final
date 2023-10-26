document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    const errorMessage = document.getElementById('errorMessage');
    let incorrectAttempts = 0;

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Replace 'your_password' with the correct password
        const correctPassword = 'BPPIMT';
        const enteredPassword = document.getElementById('password').value;

        if (enteredPassword === correctPassword) {
            // Successful login, redirect to another page
            window.location.href = 'user.html';
        } else {
            // Wrong password
            incorrectAttempts++;

            if (incorrectAttempts === 1) {
                // First incorrect attempt, show a warning message
                errorMessage.textContent = 'Incorrect password. This is your first warning.';
            } else if (incorrectAttempts === 2) {
                // Second incorrect attempt, redirect to the "Forgot Password" page
                errorMessage.textContent = 'Incorrect password. Redirecting to Forgot Password page...';
                setTimeout(function () {
                    window.open('forget-pass.html','_blank'); // Redirect to the "Forgot Password" page
                }, 2000); // Delay for 2 seconds (adjust as needed)
            }
        }
    });
});
