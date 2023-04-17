import {checkWhoOnlineID} from './check-who-onlineID';

function showProfileData() {
    let profileData = document.querySelector('.profile-data');
    profileData.classList.toggle('hidden');
 
    let editData = document.querySelector('.edit-profile-data');
    editData.onclick = () => {
        let form = document.querySelector('#profile-form');
        form.classList.toggle('hidden');
        form.classList.toggle('profile-form');
    }

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
export {showProfileData}