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
    const type = password.type === "password" ? "text" : "password";
    password.type = type;
    this.innerHTML = type === "password" ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
});
