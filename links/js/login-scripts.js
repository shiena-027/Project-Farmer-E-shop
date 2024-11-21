// Interactive input focus and blur effects
const inputs = document.querySelectorAll('input');

inputs.forEach(input => {
  input.addEventListener('focus', () => {
    input.style.backgroundColor = '#eafaf1';
  });

  input.addEventListener('blur', () => {
    input.style.backgroundColor = '';
  });
});

// Simulate form submission
document.getElementById('login-form').addEventListener('submit', (e) => {
  e.preventDefault();
  alert('Login Successful!');
});
