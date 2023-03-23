import { Admin } from './admin-data.js';

let usernameInput = document.querySelector('#username');
let passwordInput = document.querySelector('#password');
let wrongMessage = document.querySelector('.wrong-message');
if (wrongMessage) {
    wrongMessage.hidden = true;
}

function doLogin(loginButton) {
    loginButton.onclick = () => {
        if (usernameInput.value === Admin.username && +passwordInput.value === Admin.password) {
            window.location.href = 'profile.html';
            sessionStorage.setItem('name', Admin.username);
            sessionStorage.setItem('password', Admin.password);
            sessionStorage.setItem('status', 'online');
        }
        else {
            wrongMessage.hidden = false;
        };
    }
}

export { doLogin }