import { checkWhoOnline } from "./check-who-online";

function redirectAnouthorized() {
let links = document.querySelectorAll('a');
if (!checkWhoOnline()) {
    for (let link of links) {
        if (link.getAttribute('href') === 'profile.html') {
            link.setAttribute('href', 'login.html');
        }
    }
}
}

export {redirectAnouthorized}