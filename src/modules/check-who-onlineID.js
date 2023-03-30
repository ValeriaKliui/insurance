function checkWhoOnlineID() {
    let keys = Object.keys(localStorage);
    for (let key of keys) {
        if (!key.startsWith('program')) {
        if (JSON.parse(localStorage.getItem(key)).status === 'online') {
        return JSON.parse(localStorage.getItem(key)).personID;
        }
    }
}
}

export {checkWhoOnlineID}