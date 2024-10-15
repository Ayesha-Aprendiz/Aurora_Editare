<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aurora</title>
    <link rel="icon" type="image/x-icon" href="weblogo.png">

    <link rel="stylesheet" href="css/homestyle.css">
    <script src='star.js' type="javascript"> </script>
    
</head>

<body id='index'>
   <div id="logo">
    
   <img id="logoimg" src="images/weblogo.png" alt="logo" />
    </div> 
    <div class="progress-bar-container">
            <div class="progress-bar" id="progress-bar"></div>
    </div>
    <script>
        
    // Time for the loading screen to display (in milliseconds)
    //const loadingTime = 18000; // 5 seconds

    // Set the progress bar width to 100% after a delay
    setTimeout(() => {
        const progressBar = document.getElementById('progress-bar');
        progressBar.style.width = '100%';

        // Redirect to another page after the loading time
        setTimeout(() => {
            window.location.href = 'index.html'; // Replace with your target page URL
        }, 5000); // Small delay to allow the progress bar to complete
        }, 100); // Initial delay before starting progress bar animation
        </script>
</body>
</html> 
