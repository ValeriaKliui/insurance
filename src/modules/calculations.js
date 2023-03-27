let finalCost = document.querySelector('.final-cost');
let year = document.querySelector('#age');

const form = document.querySelector('.calculation-form');


function calculate() {
    form.addEventListener('change', function() {
        console.log()
        checkYear(year.value)
    });
}
function checkYear(year) {
    if (year>2015) finalCost.innerHTML= `${+finalCost.innerHTML+400}`; 
}
export {calculate}