// Fonction de validation
function validateForm() {
  // Récupérer les valeurs des champs
  var nomevent = document.getElementById('nomevent').value;
  var descrip = document.getElementById('description').value;
  var lieu = document.getElementById('lieu').value;
  var capacite = document.getElementById('capacite').value;
  //var nomtype = document.getElementById('nomtype').value;

  // Expression régulière pour vérifier si nomclasse contient au moins 1 caractère alphabétique
  var nomeventRegex = /^[a-zA-Z]+$/;
  var descriptionRegex = /^[a-zA-Z]+$/;
  var lieuRegex = /^[a-zA-Z]+$/;
  //var nomtypeRegex = /^[a-zA-Z]+$/;
  

  // Vérifier si nomevent est valide
  if (!descriptionRegex.test(descrip)) {
      alert('La desciprtion doit contenir au moins un caractère alphabétique.');
      return false;
  }
  if (!lieuRegex.test(nomevent)) {
      alert('Le nom de event doit contenir au moins un caractère alphabétique.');
      return false;
  }


  // Vérifier si nbpatient est un nombre positif ou nul
  if (isNaN(capacite) || capacite< 0) {
      alert('Le nombre de patients doit être un nombre positif ou égal à 0.');
      return false;
  }

  /*if (!nomtypeRegex.test(nomtype)) {
    alert('Le nom de type doit contenir uniquement des caractères alphabétiques.');
    return false;
  }*/
  // Si tout est valide, le formulaire peut être soumis
  return true;
}

