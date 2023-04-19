import {checkWhoOnline} from './check-who-online';

function redirectAdmin() {
    let links = document.querySelectorAll('a');
    if (checkWhoOnline() === 'Admin') {
        for (let link of links) {
            if (link.getAttribute('href') === 'profile.html') {
                link.setAttribute('href', 'Admin_profile.html');
            }
            if (link.getAttribute('href') === 'service-med.html') {
                link.setAttribute('href', 'Admin_service-med.html');
            }
        }
    }    
}
export {redirectAdmin}