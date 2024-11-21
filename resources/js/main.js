let darkModeSwitch = document.querySelector('.switch input');
let body = document.querySelector('body');

let mode = localStorage.getItem('mode');
if (mode === 'dark') {
    body.classList.add('darkMode');
    darkModeSwitch.checked = true;
} else {
    body.classList.remove('darkMode');
    darkModeSwitch.checked = false; 
}

darkModeSwitch.addEventListener('change', () => {
    if (darkModeSwitch.checked) {
        body.classList.add('darkMode');
        localStorage.setItem('mode', 'dark');
    } else {
        body.classList.remove('darkMode');
        localStorage.setItem('mode', 'light');
    }
});

const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

togglePassword.addEventListener("click", function () {
    if (password.type === "password") {
        password.type = "text";
        this.innerHTML = '<i class="bi bi-eye-slash"></i>';
    } else {
        password.type = "password";
        this.innerHTML = '<i class="bi bi-eye"></i>';
    }
});



