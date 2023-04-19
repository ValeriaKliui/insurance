function checkWhoOnlineID() {
    let keys = Object.keys(localStorage);
    for (let key of keys) {
        if (!key.startsWith('program')) {
            if (localStorage.getItem('personID') !=='undefined') {
                if (JSON.parse(localStorage.getItem(key)).status === 'online') {
            localStorage.setItem("personID", JSON.parse(localStorage.getItem(key)).personID);
        return JSON.parse(localStorage.getItem(key)).personID;
        }
    }
}
}
}

export {checkWhoOnlineID}