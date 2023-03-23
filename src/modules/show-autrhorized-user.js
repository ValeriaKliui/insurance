function removeButtonLogIn() {
    let buttonLogIn = document.querySelector('.button-login');
    if (buttonLogIn) {
        buttonLogIn.hidden = true;
    }
}
function removeButtonLogOut() {
    let buttonLogOutt = document.querySelector('.button-logout');
    buttonLogOutt.hidden = true;
}
function showUsername() {
    let keys = Object.keys(localStorage);
    for (let key of keys) {
        if (JSON.parse(localStorage.getItem(key)).status === 'online') {
            let username = key;
            let usernameBlock = document.querySelector('.username');
            usernameBlock.textContent = username;
        }
    }
}

export {removeButtonLogIn, removeButtonLogOut, showUsername} 