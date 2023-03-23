function showPassword(checkbox) {
    let passwordFields = document.querySelectorAll('.password-field');
    checkbox.onclick = ()=>{
        if(checkbox.checked){
            passwordFields.forEach(passwordField => passwordField.type = 'text');
        }
        else passwordFields.forEach(passwordField => passwordField.type = 'password');
    }
}

export {showPassword}