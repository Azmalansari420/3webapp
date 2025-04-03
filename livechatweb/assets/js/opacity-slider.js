/*============================
    opacity slider CSS start
==============================*/
const image = document.getElementById('demo-img');
const opacitySlider = document.getElementById('opacity-slider');

// Function to handle slider change event
function handleSliderChange() {
    // Set the opacity of the image based on the slider value
    image.style.opacity = opacitySlider.value;
}

// Attach the handleSliderChange function to the slider's input event
opacitySlider.addEventListener('input', handleSliderChange);