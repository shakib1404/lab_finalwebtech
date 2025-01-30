// Get the "About Me" div and the options div
const aboutMe = document.getElementById('aboutMe');
const options = document.getElementById('options');

// JavaScript function to show the options
function showOptions() {
  options.style.display = 'block';  // Show the options
}

// JavaScript function to hide the options
function hideOptions() {
  options.style.display = 'none';  // Hide the options
}

// Event listeners to handle mouse enter and leave
aboutMe.addEventListener('mouseenter', showOptions);
aboutMe.addEventListener('mouseleave', hideOptions);
