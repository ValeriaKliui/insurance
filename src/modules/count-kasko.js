function countKasko() {
    let form = document.querySelector('.calculation-form');
    form.addEventListener('input', () => {
        let price = 100;
        let countDiv = document.querySelector('.kasko__cost');
        let yearInput = document.querySelector('#age').value;
        let sum = document.querySelector('.sum').value;

        price = sum / 150 * 1.2 + yearInput / 2000 * 5 + ((checkbox() == 500) ? 500 : (checkbox() == 400) ? 400 : (checkbox() == 350) ? 350 : (checkbox() == 250) ? 250 : (checkbox() == 350) ? 350:100);
        countDiv.innerHTML = Math.ceil(price);
        form.querySelector('#cost').value = price;
    })
}

function checkbox() {
    var rad = document.getElementsByName('cost');
    for (var i = 0; i < rad.length; i++) {
        if (rad[i].checked) {
            return rad[i].value;
        }
    }
}

export { countKasko }