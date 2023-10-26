// Function to show the loading overlay
function showLoadingOverlay() {
    const overlay = document.getElementById("loading-overlay");
    overlay.style.display = "block";
}

// Function to hide the loading overlay
function hideLoadingOverlay() {
    const overlay = document.getElementById("loading-overlay");
    overlay.style.display = "none";
}

// Show the loading overlay when the page starts loading
showLoadingOverlay();

// Add an event listener for the "DOMContentLoaded" event to hide the overlay once the page is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    // Simulate some content loading (e.g., fetching data or resources)
    setTimeout(function () {
        // After loading is complete, hide the loading overlay
        hideLoadingOverlay();
    }, 3000); // Simulated 3-second loading time, replace with your actual loading logic
});
