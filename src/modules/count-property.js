function countProperty() {
    let form = document.querySelector('.property-form');
    form.addEventListener('input', ()=>{
    let price = 50;
    let countDiv = document.querySelector('.property__cost');
    let sum = document.querySelector('.sum').value;
    price = sum / 250 * 1.2  + ((checkbox()=='flat') ? 50 : (checkbox()=='house') ? 100 : (checkbox()=='cottage') ? 150 : 1);
    countDiv.innerHTML = Math.ceil(price);
    form.querySelector('#cost').value = price;
    })
}

function checkbox(){
    var rad=document.getElementsByName('type_of_property');
    for (var i=0;i<rad.length; i++) {
      if (rad[i].checked) {
       return rad[i].value;
      }
    }
   }

export { countProperty }