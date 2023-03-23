function checkWhoOnline() {
    let keys = Object.keys(localStorage);
    for (let key of keys) {
        if (JSON.parse(localStorage.getItem(key)).status === 'online') {
        return key;
        }
}
}

export {checkWhoOnline}