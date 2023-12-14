const form = document.querySelector("form");

const titreInput = document.getElementById("titre");
const descriptionsInput = document.getElementById("descriptions");


form.addEventListener("change", function (event) {
  event.preventDefault();
  validertitre();
  validerdescriptions();
});

function validertitre() {
  const nomValeur = titreInput.value;
  const nomRegex = /^[A-Za-z]+$/;
  const erreurNom = document.getElementById("erreurtitre");

  if (!nomValeur.match(nomRegex)) {
    erreurNom.innerHTML = "Veuillez entrer un titre valide (lettres uniquement)";
  } else {
    erreurNom.innerHTML = "<span style='color:green'> Correct </span>";
  }
}
function validerdescriptions() {
    const prenomValeur = descriptionsInput.value;
    const prenomRegex = /^[A-Za-z]+$/;
    const erreurPrenom = document.getElementById("erreurdescriptions");
  
    if (!prenomValeur.match(prenomRegex)) {
      erreurPrenom.innerHTML =
        "Veuillez entrer une description valide (lettres uniquement )";
    } else {
      erreurPrenom.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }








