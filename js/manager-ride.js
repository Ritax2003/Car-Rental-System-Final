function acceptRide() {
    // Update the counts
    const carCountElement = document.getElementById("car-count");
    const driverCountElement = document.getElementById("driver-count");

    // Get the current counts
    let carCount = parseInt(carCountElement.textContent);
    let driverCount = parseInt(driverCountElement.textContent);

    // Check if there are available cars and drivers
    if (carCount > 0 && driverCount > 0) {
        // Reduce the counts by 1
        carCount--;
        driverCount--;

        // Update the HTML elements with the new counts
        carCountElement.textContent = carCount;
        driverCountElement.textContent = driverCount;

        // You can also send a request to your backend to update the counts in the database.
        // Example: sendUpdateRequest(carCount, driverCount);
    } else {
        alert("No available cars or drivers.");
    }
}

// Attach an event listener to the accept button
document.addEventListener("DOMContentLoaded", function () {
    const acceptButtons = document.querySelectorAll(".accept-button");

    acceptButtons.forEach(function (button) {
        button.addEventListener("click", acceptRide);
    });
});