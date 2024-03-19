<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Animated Page</title>
<style>
  /* CSS for styling */
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden; /* Hide overflow to prevent scrollbars */
    position: relative; /* Add relative position to allow absolute positioning */
  }

  .container {
    text-align: center;
  }

  h1 {
    color: #333;
  }

  p {
    color: #666;
    font-size: 18px;
  }

  .animation {
    animation: fadeIn 2s ease-out forwards;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  /* Sobymle icon animation */
  .sobymle {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    animation: launchSobymle 3s forwards;
  }

  @keyframes launchSobymle {
    0% {
      transform: translate(-50%, 0);
    }
    100% {
      transform: translate(-50%, -200%);
    }
  }
</style>
</head>
<body>
<div class="container">
  <div class="content">
    <h1 class="animation">Your orders have been successfully placed.</h1>
    <p class="animation">Thank you for choosing our service.</p>
  </div>
</div>

<!-- Sobymle icon -->
<svg class="sobymle" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
  <path fill="#000000" d="M21,10c0,0.55-0.45,1-1,1s-1-0.45-1-1c0-4.42-3.58-8-8-8s-8,3.58-8,8c0,0.55-0.45,1-1,1s-1-0.45-1-1 c0-5.52,4.48-10,10-10S21,4.48,21,10z M14.7,15.3l-0.01,0.01c0.39,0.39,0.39,1.02,0,1.41c-0.39,0.39-1.02,0.39-1.41,0l-0.01-0.01 l-1.29-1.29l-1.29,1.29l-0.01,0.01c-0.39,0.39-1.02,0.39-1.41,0c-0.39-0.39-0.39-1.02,0-1.41l0.01-0.01l1.29-1.29l-1.29-1.29 l-0.01-0.01c-0.39-0.39-0.39-1.02,0-1.41c0.39-0.39,1.02-0.39,1.41,0l0.01,0.01l1.29,1.29l1.29-1.29l0.01-0.01 c0.39-0.39,1.02-0.39,1.41,0c0.39,0.39,0.39,1.02,0,1.41l-0.01,0.01l-1.29,1.29L14.7,15.3z"/>
</svg>

<script>
  // JavaScript for additional interactivity or animations
  document.addEventListener("DOMContentLoaded", function() {
    const contentElements = document.querySelectorAll(".animation");
    contentElements.forEach(element => {
      element.style.animationDelay = Math.random() + "s";
    });
  });
</script>
</body>
</html>
<meta http-equiv="refresh" content="2;url=orders.php">