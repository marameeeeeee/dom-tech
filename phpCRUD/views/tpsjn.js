// tpsjn.js

const nomInput = document.getElementById("nom");

const erreurNom = document.getElementById("erreurnom");


// Appel initial de la fonction de validation
validernom();


// Utilisation de l'événement 'input' pour la validation en temps réel
nomInput.addEventListener("input", validernom);


function validernom() {
  const nomValeur = nomInput.value;
  const nomRegex = /^[A-Za-z]+$/;

  if (!nomValeur.match(nomRegex)) {
    erreurNom.innerHTML = "Veuillez entrer un nom valide (lettres uniquement)";
  } else {
    erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
  }
}

