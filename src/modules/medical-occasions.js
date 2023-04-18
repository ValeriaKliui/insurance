import {checkWhoOnlineID} from './check-who-onlineID';

function sendOccasion() {
    let personIDarea = document.createElement('input');
    personIDarea.classList.add('person_id');
    let form = document.querySelector('.occasion_form');
    form.append(personIDarea);
    personIDarea.setAttribute("value", checkWhoOnlineID());
    personIDarea.setAttribute("name", "personID");
    personIDarea.hidden = true;
}
export {sendOccasion}