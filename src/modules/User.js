class User {
    constructor(name, password, status = 'offline') {
        this.name = name;
        this.password = password;
        this.status = status;
    }
    getPersonId() {
        return Math.round(Math.random()*1000);
    }
    addUser() {
        let data = {};
        let personID = this.getPersonId();
        data.personID = personID;
        data.password = this.password;
        data.status = this.status;

        let personIDarea = document.createElement('input');
        let form = document.querySelector('.form-sign-up');
        form.append(personIDarea);
        personIDarea.setAttribute("value", data.personID);
        personIDarea.setAttribute("name", "personID");
        personIDarea.hidden = true;
        data = JSON.stringify(data);
        localStorage.setItem(this.name, data);
        localStorage.setItem("personID", personID);
        }
}

export {User}