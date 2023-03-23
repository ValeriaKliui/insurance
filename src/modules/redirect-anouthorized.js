function redirectAnouthorized() {
let links = document.querySelectorAll('a');
if (!sessionStorage.getItem('name')) {
    for (let link of links) {
        if (link.getAttribute('href') === 'profile.html') {
            link.setAttribute('href', 'login.html');
        }
    }
}
}

export {redirectAnouthorized}