const form = document.querySelector("form");

const typesInput = document.getElementById("types");
const nomInput = document.getElementById("nom");
const prixInput = document.getElementById("prix");



form.addEventListener("change", function (event) {
  event.preventDefault();
  validerTypes();
  validerNom();
  validerPrix();
  
});

function validerTypes() {
    const typesValeur = typesInput.value;
    const typesRegex = /^(Premium|Normal|Gratuit)$/ ;
    const erreurTypes = document.getElementById("erreurTypes");
  
    if (!typesValeur.match(typesRegex)) {
      erreurTypes.innerHTML =
        "   Veuillez entrer un type valide (Premium Normal Gratuit)";
    } else {
      erreurTypes.innerHTML = "<span style='color:green'>   Type Valide </span>";
    }
  }
  function validerNom() {
    const nomValeur = nomInput.value;
    const nomRegex = /^[A-Za-z]+$/;
    const erreurNom = document.getElementById("erreurNom");
  
    if (!nomValeur.match(nomRegex)) {
      erreurNom.innerHTML = "Veuillez entrer un nom valide (contient que des caracteres) ";
    } else {
      erreurNom.innerHTML = "<span style='color:green'> Nom Valide </span>";
    }
  }
  
function validerPrix() {
    const prixValeur = prixInput.value;
    const prixRegex = /^\d+$/ ;
    const erreurPrix = document.getElementById("erreurPrix");
  
    if (!prixValeur.match(prixRegex)) {
      erreurPrix.innerHTML =
        " Veuillez entrer un prix valide (nombres uniquement)";
    } else {
      erreurPrix.innerHTML = "<span style='color:green'>    Prix valide </span>";
    }
  }




