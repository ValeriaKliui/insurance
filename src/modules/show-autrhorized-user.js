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
    let username = sessionStorage.getItem('name');
    let usernameBlock = document.querySelector('.username');
    usernameBlock.textContent = username;
}

export {removeButtonLogIn, removeButtonLogOut, showUsername} 