import {checkWhoOnlineID} from './check-who-onlineID';

function showProfileData() {
    if (!document.querySelector('.person_id')) {
    let personIDarea = document.createElement('input');
    personIDarea.classList.add('person_id');
    let form = document.querySelector('#profile-form');
    form.append(personIDarea);
    personIDarea.setAttribute("value", checkWhoOnlineID());
    personIDarea.setAttribute("name", "personID");
    personIDarea.hidden = true;
    }
}
export {showProfileData};