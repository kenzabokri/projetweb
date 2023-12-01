// Fonction de validation
function validateForm() {
    // Récupérer les valeurs des champs
    var seance = document.getElementById('seance').value;
    var dateDebut = document.getElementById('dateDebut').value;
    var dateFin = document.getElementById('dateFin').value;

    // Expression régulière pour vérifier si seance contient uniquement des lettres alphabétiques
    var seanceRegex = /^[a-zA-Z]*$/;

    // Vérifier si seance est valide
    if (!seanceRegex.test(seance)) {
        alert('La séance doit contenir uniquement des lettres alphabétiques.');
        return false;
    }

    // Vérifier si dateDebut est un nombre positif ou égal à 0
    if (isNaN(dateDebut) || dateDebut < 0) {
        alert('La date de début doit être un nombre positif ou égal à 0.');
        return false;
    }

    // Vérifier si dateFin est un entier positif
    if (isNaN(dateFin) || dateFin < 0 || dateFin % 1 !== 0) {
        alert('La date de fin doit être un entier positif.');
        return false;
    }

    // Si tout est valide, le formulaire peut être soumis
    return true;
}
