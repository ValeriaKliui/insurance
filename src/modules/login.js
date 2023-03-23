let usernameInput = document.querySelector('#username');
let passwordInput = document.querySelector('#password');
let wrongMessage = document.querySelector('.wrong-message');
if (wrongMessage) {
    wrongMessage.hidden = true;
}

function doLogin(loginButton) {
    loginButton.onclick = () => {
      if (localStorage.getItem(usernameInput.value)) {
            window.location.href = 'index.html';
            let parsed = JSON.parse(localStorage.getItem(usernameInput.value));
            if (`${parsed.password}` === passwordInput.value) {
            parsed.status = 'online';
            let stringified = JSON.stringify(parsed);
            localStorage.setItem(usernameInput.value, stringified)
            }
        }
        else {
            wrongMessage.hidden = false;
        };
    }
}

export { doLogin }