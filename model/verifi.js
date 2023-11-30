// Fonction de validation
function validateForm() {
    // Récupérer les valeurs des champs
    var nomtype = document.getElementById('nomtype').value;

    // Expression régulière pour vérifier si nomtype contient au moins 1 caractère alphabétique
    var nomtypeRegex = /^[a-zA-Z]+$/;

    // Vérifier si nomtype est valide
    if (!nomtypeRegex.test(nomtype)) {
        alert('Le nom de type doit contenir uniquement des caractères alphabétiques.');
        return false;
    }

    // Si tout est valide, le formulaire peut être soumis
    return true;
}
