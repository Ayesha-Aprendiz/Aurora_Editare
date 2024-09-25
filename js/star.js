
// Time for the loading screen to display (in milliseconds)
const loadingTime = 10000; // 5 seconds

// Set the progress bar width to 100% after a delay
setTimeout(() => {
    const progressBar = document.getElementById('progress-bar');
    progressBar.style.width = '100%';

    // Redirect to another page after the loading time
    setTimeout(() => {
        window.location.href = 'your-target-page.html'; // Replace with your target page URL
    }, 1000); // Small delay to allow the progress bar to complete
}, 100); // Initial delay before starting progress bar animation