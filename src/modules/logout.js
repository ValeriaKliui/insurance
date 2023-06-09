import { checkWhoOnline } from "./check-who-online";

function doLogout(buttonLogOut) {
    buttonLogOut.onclick = () => {
        if (checkWhoOnline()) {
                let parsed = JSON.parse(localStorage.getItem(checkWhoOnline()));
                parsed.status = 'offline';
                let stringified = JSON.stringify(parsed);
                localStorage.setItem(checkWhoOnline(), stringified);
                localStorage.removeItem('program');
                localStorage.removeItem('personID');
        }
        location.reload();
    }
}

export { doLogout }