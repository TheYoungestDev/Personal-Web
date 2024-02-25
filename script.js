document.addEventListener("DOMContentLoaded", function () {
    // Simulate a delay (4 seconds in this case)
    setTimeout(function () {
        // Hide the preloader
        document.querySelector(".preloader-container").style.display = "none";
        
        // Show the main content
        document.querySelector(".content").style.display = "block";
    }, 700);
});
