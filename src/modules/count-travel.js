function countTravel() {
    let form = document.querySelector('.travel-form');
    form.addEventListener('input', ()=>{
    let price = 5;
    let countDiv = document.querySelector('.travel__cost');
    let sum = document.querySelector('.sum').value;
    let duration = document.querySelector('.duration').value;
    price = sum / 150 * 1.2 + duration / 10 * 5 + ((checkbox()=='none') ? 5 : (checkbox()=='active') ? 10 : (checkbox()=='extreme') ? 15 : 1);
    countDiv.innerHTML = Math.ceil(price);
    form.querySelector('#cost').value = price;
    })
}

function checkbox(){
    var rad=document.getElementsByName('type_of_relax');
    for (var i=0;i<rad.length; i++) {
      if (rad[i].checked) {
       return rad[i].value;
      }
    }
   }

export { countTravel }