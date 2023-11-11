// Get values from HTML
const img = document.querySelectorAll("img");
const h2 = document.querySelectorAll("h2");
const p = document.querySelectorAll("p");
let i = 0;

// Initialize first elements
img[0].style.display = "block";
h2[0].style.display = "block";
p[0].style.display = "block";

// Function to show next element and hide previous
const show = () => {
  img[i].style.display = "none";
  h2[i].style.display = "none";
  p[i].style.display = "none";
  if (i === img.length - 1) {
    i = -1;
  }
  i++;
  img[i].style.display = "block";
  h2[i].style.display = "block";
  p[i].style.display = "block";
};
setInterval(show, 5000);
