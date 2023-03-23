import { User } from "./User";
import { Admin } from "./admin-data";

let form = document.querySelector('.form-sign-up');

let wrongMessage = document.querySelector('.wrong-message');
if (wrongMessage) {
    wrongMessage.hidden = true;
}

function createAdmin() {
let admin = new User(Admin.username, Admin.password);
admin.addUser();
}

function doRegister() {
    let name = document.querySelector('#username');
    let password = document.querySelector('#password');
    if (!localStorage.getItem(name.value)) {
    let user = new User(`${name.value}`, password.value);
    user.addUser();
    form.submit();
    }
    else wrongMessage.hidden = false;
}

export { doRegister, createAdmin }