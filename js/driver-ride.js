// Get the `Today Completed Ride` number
const todayCompletedRideNumber = document.querySelector(`b[data-name="Today Completed Ride"]`);

// Increase the number by 1
todayCompletedRideNumber.textContent = todayCompletedRideNumber.textContent + 1;