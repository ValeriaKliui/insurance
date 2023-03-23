let wrongMessage = document.querySelector('.wrong-message');
if (wrongMessage) {
    wrongMessage.hidden = true;
}

let form = document.querySelector('.form-sign-up');

function checkPassword(firstPass, anothPass) {
        if (firstPass !== anothPass) return false;
        else return true;
}

export { checkPassword }