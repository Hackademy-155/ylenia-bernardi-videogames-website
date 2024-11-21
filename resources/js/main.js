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

document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function () {
        const targetId = this.getAttribute('data-target');
        const targetInput = document.getElementById(targetId);

        if (targetInput.type === 'password') {
            targetInput.type = 'text';
            this.innerHTML = '<i class="bi bi-eye-slash"></i>';
        } else {
            targetInput.type = 'password';
            this.innerHTML = '<i class="bi bi-eye"></i>';
        }
    });
});




