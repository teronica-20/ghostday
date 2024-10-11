// Validasi Form Login
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const errorMessage = document.getElementById("errorMessage");

    errorMessage.textContent = "";

    if (username === "" || password === "") {
        errorMessage.textContent = "Please fill in all fields.";
        shakeForm(document.querySelector(".login-form"));
        return false;
    }

    if (password.length < 6) {
        errorMessage.textContent = "Password must be at least 6 characters.";
        shakeForm(document.querySelector(".login-form"));
        return false;
    }
    // Koneksi ke database di-comment sementara
// this.submit(); 

// Redirect to the main menu (beranda.html) without using database
window.location.href = "menu utama/beranda.html";
});

// Validasi Form Registrasi
document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const username = document.getElementById("regUsername").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("regPassword").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();
    const errorMessage = document.getElementById("regErrorMessage");

    errorMessage.textContent = "";

    if (username === "" || email === "" || password === "" || confirmPassword === "") {
        errorMessage.textContent = "Please fill in all fields.";
        shakeForm(document.querySelector(".register-form"));
        return false;
    }

    if (password.length < 6) {
        errorMessage.textContent = "Password must be at least 6 characters.";
        shakeForm(document.querySelector(".register-form"));
        return false;
    }

    if (password !== confirmPassword) {
        errorMessage.textContent = "Passwords do not match.";
        shakeForm(document.querySelector(".register-form"));
        return false;
    }

    this.submit();
});

// Function to add a shake effect on error
function shakeForm(form) {
    form.classList.add("shake");
    setTimeout(() => {
        form.classList.remove("shake");
    }, 500);
}

document.addEventListener("DOMContentLoaded", function() {
    // Validasi Form Login
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const errorMessage = document.getElementById("errorMessage");

    errorMessage.textContent = "";

    if (username === "" || password === "") {
        errorMessage.textContent = "Please fill in all fields.";
        shakeForm(document.querySelector(".login-form"));
        return false;
    }

    if (password.length < 6) {
        errorMessage.textContent = "Password must be at least 6 characters.";
        shakeForm(document.querySelector(".login-form"));
        return false;
    }

    // Redirect to the main menu (beranda.html)
    window.location.href = "menu utama/beranda.html";
});
});

// Memuat footer dari file footer.html
window.addEventListener('DOMContentLoaded', () => {
    fetch('footer.html')
      .then(response => response.text())
      .then(data => {
        document.getElementById('footer').innerHTML = data;
      })
      .catch(error => console.error('Error loading footer:', error));
  });
  // Function to add a shake effect on error
function shakeForm(form) {
    form.classList.add("shake");
    setTimeout(() => {
        form.classList.remove("shake");
    }, 500);
}
