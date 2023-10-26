let countdownInterval; 
let isRideCanceled = false;
function startCountdown() {
    const timerElement = document.getElementById("countdown-timer");
    const cancelButton = document.getElementById("cancel-button-end");

    let minutes = 0;
    let seconds = 30;

    countdownInterval = setInterval(function () {
        if (minutes === 0 && seconds === 0) {
            clearInterval(countdownInterval);
            timerElement.textContent = "Cancellation Period has ended";
            cancelButton.disabled = true; // Disable the "Cancel Ride" button
        } else {
            if (seconds === 0) {
                minutes--;
                seconds = 59;
            } else {
                seconds--;
            }

            const formattedMinutes = String(minutes).padStart(2, "0");
            const formattedSeconds = String(seconds).padStart(2, "0");
            timerElement.textContent = `${formattedMinutes}:${formattedSeconds}`;
        }
    }, 1000);
}

// Attach an event listener to start the countdown when the page loads
document.addEventListener("DOMContentLoaded", startCountdown);


