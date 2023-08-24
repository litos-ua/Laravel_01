
var currentImageIndex = 0; // Start with the first image

function updateBackgroundImage() {
    //console.log('Updating background image...'); // Debug line

    var backgroundImage = backgroundImages[currentImageIndex];
    document.body.style.opacity = 0; // Set opacity to 0 for fade out

    setTimeout(function () {
        document.body.style.backgroundImage = 'url(' + backgroundImage + ')';
        document.body.style.opacity = 1; // Set opacity to 1 for fade in
        currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
    }, 1000); // Delay the image change by 1 second for fade out effect
}

$(document).ready(function () {
    updateBackgroundImage(); // Initial call
    setInterval(updateBackgroundImage, 30000); // Change interval for testing
});
