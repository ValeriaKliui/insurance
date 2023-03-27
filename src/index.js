import './index.html';
import './index.scss';
import { removeButtonLogIn, removeButtonLogOut, showUsername } from './modules/show-autrhorized-user';
import { showPassword } from './modules/show-the-password';
import { doLogin } from './modules/login';
import { doLogout } from './modules/logout';
import { redirectAnouthorized } from './modules/redirect-anouthorized';
import { checkPassword } from './modules/check-password';
import { doSignUp } from './modules/sign-up';
import { doRegister, allUssers } from './modules/register'
import { checkWhoOnline } from './modules/check-who-online'
import {createAdmin} from './modules/register'
import {calculate} from './modules/calculations'

if (!localStorage.getItem('Admin')) createAdmin();

let iconOfUser = document.querySelector('.authorized-user');
let buttonLogOut = document.querySelector('.button-logout');
console.log(checkWhoOnline())
if (iconOfUser) {
    if (checkWhoOnline()) {
        showUsername();
        removeButtonLogIn();
    }
    if (!checkWhoOnline()) {
        if (iconOfUser) iconOfUser.hidden = true;
        if (buttonLogOut) removeButtonLogOut();
    }
    if (window.location.href.includes('login.html')) {
        iconOfUser.hidden = true;
    }
}

let checkbox = document.querySelector('.visibility-of-password');
if (checkbox) {
    showPassword(checkbox);
}

let loginButton = document.querySelector('.login-button');
if (loginButton) {
    doLogin(loginButton);
}

redirectAnouthorized();

if (buttonLogOut) {
    doLogout(buttonLogOut);
}

let passwordInputFirst = document.querySelector('#password');
let passwordInputSecond = document.querySelector('.password-field__check');
checkPassword(passwordInputFirst, passwordInputSecond);

// let signUpButton = document.querySelector('.sign-up-button');
// if (signUpButton) {
//     doSignUp(signUpButton);
// }


let registerButton = document.querySelector('.sign-up-button');
if (registerButton)  {
    registerButton.onclick =()=> {
         doRegister();
    }
}

let finalCost = document.querySelector('.final-cost');
if (finalCost) {
    calculate();
}