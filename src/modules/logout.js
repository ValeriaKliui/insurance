function doLogout(buttonLogOut){
buttonLogOut.onclick = ()=>{
    if (sessionStorage.getItem('status') === 'offline'){
        sessionStorage.removeItem('name');
        sessionStorage.removeItem('password');
    }
    location.reload();
}
}

export {doLogout}