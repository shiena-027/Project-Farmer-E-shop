// Toggle Password Visibility
function togglePassword() {
  const passwordInput = document.getElementById('password');
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
}

// Password Validation Feedback
const passwordInput = document.getElementById('password');
const passwordHint = document.getElementById('password-hint');

passwordInput.addEventListener('input', () => {
  if (passwordInput.value.length >= 8) {
    passwordHint.textContent = 'Password is strong!';
    passwordHint.classList.add('valid');
  } else {
    passwordHint.textContent = 'Password must be at least 8 characters long.';
    passwordHint.classList.remove('valid');
  }
});

// Simulate Form Submission
document.getElementById('seller-form').addEventListener('submit', (e) => {
  e.preventDefault();
  alert('Registration Successful!');
});
