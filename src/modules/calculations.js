import { Program } from "./Program";

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
let costOptim = document.querySelector('.cost_optim');
let cost500From1 = document.querySelector('.cost_500_from1');
let cost500From2 = document.querySelector('.cost_500_from2');
let costFull = document.querySelector('.cost_full');

let pragmaticVal = +document.querySelector('.cost_pragmatic').outerText;
let costOptimVal = +document.querySelector('.cost_optim').outerText;
let cost500From1Val = +document.querySelector('.cost_500_from1').outerText;
let cost500From2Val = +document.querySelector('.cost_500_from2').outerText;
let costFullVal = +document.querySelector('.cost_full').outerText;

let pragmaticObj = new Program(pragmatic.className, pragmaticVal);
let costOptimObj = new Program(costOptim.className, costOptimVal);
let cost500From1Obj = new Program(cost500From1.className, cost500From1Val);
let cost500From2Obj = new Program(cost500From2.className, cost500From2Val);
let costFullObj = new Program(costFull.className, costFullVal);


function calculate() {
    showTheCost();
    form.addEventListener('change', function() {
        checkYear(yearInput.value);
        calculateProgmatic(costInput.value);
        selectProgram();
        allValues = [];
        for (let cost of allCosts){
            allValues.push(+cost.outerText);
        }
         min = Math.min(...allValues);
         max = Math.max(...allValues);

        showTheCost(min, max);
    });
}
function checkYear(year) {
    if (year<2015) {
        costOptim.innerHTML = `${costOptimVal-50}`;
        cost500From1.innerHTML = `${cost500From1Val-100}`;
        cost500From2.innerHTML = `${cost500From2Val-100}`;
        costFull.innerHTML = `${costFullVal-150}`;
    };
}
function showTheCost(changedMin=min, changedMax=max) {
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
function selectProgram(){
    const programs = document.querySelectorAll('input[name="choice"]');
    for (const program of programs) {
      if (program.checked) {
        console.log(program.value)
      }
    }
    
}
export {calculate}