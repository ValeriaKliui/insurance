function checkWhoOnline() {
    let keys = Object.keys(localStorage);
    for (let key of keys) {
        if (localStorage.getItem('personID') !=='undefined') {
        if (!key.startsWith('program')) {
        if (JSON.parse(localStorage.getItem(key)).status === 'online') {
        return key;
        }
    }
    }
}
}

export {checkWhoOnline}