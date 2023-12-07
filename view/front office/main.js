let index = 0;
displayImages();

function displayImages() {
  const images = document.getElementsByClassName("oeuvre");

  // Check if there are no images
  if (images.length === 0) {
    console.error("No images found with class 'oeuvre'");
    return;
  }

  // Hide all images
  for (let i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }

  // Ensure index is within bounds
  if (index >= images.length) {
    index = 0;
  }

  // Display the current image
  if (images[index]) {
    images[index].style.display = "block";
  } else {
    console.error("Image at index " + index + " is undefined");
  }

  // Increment index for the next iteration
  index++;

  // Set a timeout for the next iteration
  setTimeout(displayImages, 2000);
}
