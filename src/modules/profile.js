import { checkWhoOnlineID } from "./check-who-onlineID";

if (document.querySelector('#txtHint')){
    let selection = document.querySelector('.insurances__select');
        selection.lastElementChild.value = checkWhoOnlineID();
}