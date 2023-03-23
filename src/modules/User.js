class User {
    constructor(name, password, status = 'offline') {
        this.name = name;
        this.password = password;
        this.status = status;
    }
    addUser() {
        let data = {};
        data.password = this.password;
        data.status = this.status;
        data = JSON.stringify(data);
        localStorage.setItem(this.name, data);
        // console.log(JSON.parse(localStorage.getItem('lera')))
    }
}

export {User}