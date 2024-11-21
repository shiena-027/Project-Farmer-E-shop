// Image Preview Functionality
const productImageInput = document.getElementById('product-image');

productImageInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    alert(`You selected: ${file.name}`);
  }
});

// Simulate Form Submission
document.getElementById('post-product-form').addEventListener('submit', (e) => {
  e.preventDefault();
  alert('Product Posted Successfully!');
});
