// Fonction de validation
function validateForm() {
    // Récupérer les valeurs des champs
    var nomclasse = document.getElementById('nomclasse').value;
    var nbpatient = document.getElementById('nbpatient').value;

    // Expression régulière pour vérifier si nomclasse contient au moins 1 caractère alphabétique
    var nomclasseRegex = /^[a-zA-Z]+$/;

    // Vérifier si nomclasse est valide
    if (nomclasse.length < 1 || !nomclasseRegex.test(nomclasse)) {
        alert('Le nom de la classe doit contenir au moins un caractère alphabétique.');
        return false;
    }

    // Vérifier si nbpatient est un nombre positif ou nul
    if (isNaN(nbpatient) || nbpatient < 0) {
        alert('Le nombre de patients doit être un nombre positif ou égal à 0.');
        return false;
    }

    // Si tout est valide, le formulaire peut être soumis
    return true;
}
