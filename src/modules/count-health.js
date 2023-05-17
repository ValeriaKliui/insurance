function countHealth() {
    let form = document.querySelector('.health-form');
    form.addEventListener('input', () => {
        let price = 30;
        let countDiv = document.querySelector('.health__cost');
        let sum = document.querySelector('.sum').value;
        price = sum/30;
        countDiv.innerHTML = Math.ceil(price);
        form.querySelector('#cost').value = price;
    })
}

export { countHealth }