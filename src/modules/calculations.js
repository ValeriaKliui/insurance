let finalCost = document.querySelector('.final-cost');
let allCosts = document.querySelectorAll('.cost');
let yearInput = document.querySelector('#age');
let costInput = document.querySelector('#cost');

const form = document.querySelector('.calculation-form');

let allValues = [];
for (let cost of allCosts){
    allValues.push(+cost.outerText);
}
let min = Math.min(...allValues);
let max = Math.max(...allValues);

let pragmatic = document.querySelector('.cost_pragmatic');
let optim = document.querySelector('.cost_optim');
let from1_500 = document.querySelector('.cost_500_from1');
let from2_500 = document.querySelector('.cost_500_from2');
let full = document.querySelector('.cost_full');

let pragmaticVal = +document.querySelector('.cost_pragmatic').outerText;
let optimVal = +document.querySelector('.cost_optim').outerText;
let from1_500Val = +document.querySelector('.cost_500_from1').outerText;
let from2_500Val = +document.querySelector('.cost_500_from2').outerText;
let fullVal = +document.querySelector('.cost_full').outerText;

function calculate() {
    showTheCost();
    form.addEventListener('change', function() {
        checkYear(yearInput.value);
        calculateProgmatic(costInput.value);
        calculateOptim(costInput.value);
        allValues = [];
        for (let cost of allCosts){
            allValues.push(+cost.outerText);
        }
         min = Math.min(...allValues);
         max = Math.max(...allValues);
        showTheCost(min, max);  
              selectProgram();
    });
}
function checkYear(year) {
    if (year) {
    if (+year<2015) {
        optim.innerHTML = `${optimVal-50}`;
        from1_500.innerHTML = `${from1_500Val-100}`;
        from2_500.innerHTML = `${from2_500Val-100}`;
        full.innerHTML = `${fullVal-150}`;
    }
    else {
        optim.innerHTML = `${optim.inner}`;
        from1_500.innerHTML = `${from1_500Val}`;
        cost500From2.innerHTML = `${cost500From2Val}`;
        full.innerHTML = `${fullVal}`;
    }
}
}
function showTheCost(changedMin=min, changedMax=max, chosen) {
    finalCost.innerHTML = `$${changedMin}-$${changedMax}`;
}
function calculateProgmatic(cost){
    let initial = 7000;
    if (cost > initial) {
        let procent = (cost-initial)/10000+1;
        cost = Math.round(procent*pragmaticVal);
        pragmatic.innerHTML = `${cost}`;
    }
}
function calculateOptim(cost){
    let initial = 12700;
    if (cost > initial) {
        let procent = (cost-initial)/10000+1-0.6;
        cost = Math.round(procent*optimVal);
        optim.innerHTML = `${cost}`;
    }
}

function selectProgram(){
    const programs = document.querySelectorAll('input[name="choice"]');
    for (const program of programs) {
      if (program.checked) {
        finalCost.innerHTML = '$' + document.querySelector(`.cost_${program.id}`).innerText;
      }
    }
    
}
export {calculate}