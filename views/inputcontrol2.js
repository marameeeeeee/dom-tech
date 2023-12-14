const form = document.querySelector("form");

const payedInput = document.getElementById("payed");



form.addEventListener("change", function (event) {
  event.preventDefault();
  validerPayed();
 
  
});

function validerPayed() {
    const payedValeur = payedInput.value;
    const payedRegex = /^(0|1)$/;  
    const erreurPayed = document.getElementById("erreurPayed");
  
    if (!payedValeur.match(payedRegex)) {
      erreurPayed.innerHTML =
        "   Veuillez entrer une entrée valide (0 : not payed , 1 : payed )";
    } else {
      erreurPayed.innerHTML = "<span style='color:green'>   Entrée Valide </span>";
    }
  }

  





