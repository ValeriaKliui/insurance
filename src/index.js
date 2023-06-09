import './index.html';
import './index.scss';
import { removeButtonLogIn, removeButtonLogOut, showUsername } from './modules/show-autrhorized-user';
import { showPassword } from './modules/show-the-password';
import { doLogin } from './modules/login';
import { doLogout } from './modules/logout';
import { redirectAnouthorized } from './modules/redirect-anouthorized';
import { checkPassword } from './modules/check-password';
import { doRegister } from './modules/register'
import { checkWhoOnline } from './modules/check-who-online'
import {show_insurances} from './modules/profile'
import {toggleAccordion} from './modules/faq'
import { showProfileData } from './modules/show-profile-data';
import { hideButtons } from './modules/hide-buttons';
import { sendOccasion } from './modules/medical-occasions';
import { checkWhoOnlineID } from './modules/check-who-onlineID'
import { redirectAdmin } from './modules/redirect-admin';
import { countTravel } from './modules/count-travel';
import { countProperty } from './modules/count-property';
import { countHealth } from './modules/count-health';
import { countKasko } from './modules/count-kasko';

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

let registerButton = document.querySelector('.sign-up-button');
if (registerButton)  {
    registerButton.onclick =()=> {
         doRegister();
    }
}


const items = document.querySelectorAll(".accordion button");
items.forEach(item => item.addEventListener('click', toggleAccordion));

let buttonData = document.querySelector('.profile__data');
if (buttonData) {
    buttonData.onclick = () =>{
    showProfileData();
}
}

let buttonEdit = document.querySelector('.edit-profile-data');
if (buttonEdit) {
    buttonEdit.onclick = () =>{
    let form = document.querySelector('#profile-form');
    form.classList.toggle('hidden');
}
}

let buttonNav = document.querySelector('#mainNav');
buttonNav.onclick = function(event) {
    hideButtons(event.target);
}

let buttonOccasion = document.querySelector('.occasion__button');
if (buttonOccasion) {
buttonOccasion.onclick = () => {
    let occasionContent = document.querySelector('.occasion__online');
    occasionContent.classList.remove('hidden');
    let occasionInfo = document.querySelector('.occasion__info');
    occasionInfo.classList.add('hidden');
    sendOccasion();
}
}

let occasionButton = document.querySelector('.button_occasion');
if (occasionButton) {
    occasionButton.onclick = () =>{
        sendOccasion();
}
}

let travelForm = document.querySelector('.country_input');
if (travelForm) {
    travelForm.oninput = () =>{
    if (!document.querySelector('.person_id')) {
        let personIDarea = document.createElement('input');
        personIDarea.classList.add('person_id');
        let form = document.querySelector('.travel-form');
        form.append(personIDarea);
        personIDarea.setAttribute("value", checkWhoOnlineID());
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        }    
}
}
let propertyForm = document.querySelector('.property_input');
if (propertyForm) {
    propertyForm.oninput = () =>{
    if (!document.querySelector('.person_id')) {
        let personIDarea = document.createElement('input');
        personIDarea.classList.add('person_id');
        let form = document.querySelector('.property-form');
        form.append(personIDarea);
        personIDarea.setAttribute("value", checkWhoOnlineID());
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        }    
}
}
let kaskoForm = document.querySelector('.mark__input');
if (kaskoForm) {
    kaskoForm.oninput = () =>{
    if (!document.querySelector('.person_id')) {
        let personIDarea = document.createElement('input');
        personIDarea.classList.add('person_id');
        let form = document.querySelector('.calculation-form');
        form.append(personIDarea);
        personIDarea.setAttribute("value", checkWhoOnlineID());
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        }    
}
}


let healthForm = document.querySelector('.health_input');
if (healthForm) {
    healthForm.oninput = () =>{
    if (!document.querySelector('.person_id')) {
        let personIDarea = document.createElement('input');
        personIDarea.classList.add('person_id');
        let form = document.querySelector('.health-form');
        form.append(personIDarea);
        personIDarea.setAttribute("value", checkWhoOnlineID());
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        }    
}
}

if (checkWhoOnline()==='Admin') {
let healthForm = document.querySelector('.kasko_input_admin');
if (healthForm) {
    healthForm.oninput = () =>{
    if (!document.querySelector('.person_id')) {
        let clientID = localStorage.getItem('clientID')
        let personIDarea = document.createElement('input');
        personIDarea.classList.add('person_id');
        let form = document.querySelector('.calculation-form');
        form.append(personIDarea);
        personIDarea.setAttribute("value", clientID);
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        }    
}
}
}
if (checkWhoOnline()==='Admin') {
    let healthForm = document.querySelector('.health_input_admin');
    if (healthForm) {
        healthForm.oninput = () =>{
        if (!document.querySelector('.person_id')) {
            let clientID = localStorage.getItem('clientID')
            let personIDarea = document.createElement('input');
            personIDarea.classList.add('person_id');
            let form = document.querySelector('.health-form');
            form.append(personIDarea);
            personIDarea.setAttribute("value", clientID);
            personIDarea.setAttribute("name", "personID");
            personIDarea.hidden = true;
            }    
    }
    }
    }

if (checkWhoOnline()==='Admin') {
let travelForm = document.querySelector('.country_input_admin');
if (travelForm) {
travelForm.oninput = () =>{
    if (!document.querySelector('.person_id')) {
        let clientID = localStorage.getItem('clientID')
        let personIDarea = document.createElement('input');
        personIDarea.classList.add('person_id');
        let form = document.querySelector('.travel-form');
        form.append(personIDarea);
        personIDarea.setAttribute("value", clientID);
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        }    
}
}
}

if (checkWhoOnline()==='Admin') {
let propertyForm = document.querySelector('.property_input_admin');
if (propertyForm) {
    propertyForm.oninput = () =>{
    if (!document.querySelector('.person_id')) {
        let clientID = localStorage.getItem('clientID')
        let personIDarea = document.createElement('input');
        personIDarea.classList.add('person_id');
        let form = document.querySelector('.property-form');
        form.append(personIDarea);
        personIDarea.setAttribute("value", clientID);
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        }    
}
}
}

if (checkWhoOnline()==='Admin') {
    let propertyForm = document.querySelector('.mark__input_admin');
    if (propertyForm) {
        propertyForm.oninput = () =>{
        if (!document.querySelector('.person_id')) {
            let clientID = localStorage.getItem('clientID')
            let personIDarea = document.createElement('input');
            personIDarea.classList.add('person_id');
            let form = document.querySelector('.calculation-form');
            form.append(personIDarea);
            personIDarea.setAttribute("value", clientID);
            personIDarea.setAttribute("name", "personID");
            personIDarea.hidden = true;
            }    
    }
    }
    }
    

if (checkWhoOnline() === 'Admin') {
    redirectAdmin();
}


let changeStatusButton = document.querySelector('.change-status_button');
if (changeStatusButton) {
    changeStatus();
}

if (document.querySelector('.travel__cost')){
countTravel()}

if (document.querySelector('.property__cost')){
    countProperty()}

    if (document.querySelector('.health__cost')){
        countHealth()}

        if (document.querySelector('.kasko__cost')){
            countKasko()}