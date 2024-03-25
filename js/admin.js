function submitHandler(event) {
    event.preventDefault();

    // Get input values
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Check if username and password match admin credentials
    if (username === 'admin' && password === '1234') {
      // Redirect to another HTML file (e.g., admin_panel.html) upon successful login
      window.location.href = 'admin-panel/admin_panel.php';
    } else {
     alert('Грешна парола'); // Change this line for handling incorrect login attempts
    }
  }