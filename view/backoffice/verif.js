function validateEventForm() {
    var nomevent = document.getElementById('nomevent').value.trim();
    var capacite = document.getElementById('capacite').value.trim();
    var lieu = document.getElementById('lieu').value.trim();
    var type = document.getElementById('type').value.trim();

    // Vérification du nomevent, lieu, et type (caractères uniquement)
    var stringRegex = /^[a-zA-Z]+$/;

    if (nomevent !== '' && !stringRegex.test(nomevent)) {
        alert('Le nomevent doit contenir uniquement des caractères alphabétiques.');
        return false;
    }

    if (lieu !== '' && !stringRegex.test(lieu)) {
        alert('Le lieu doit contenir uniquement des caractères alphabétiques.');
        return false;
    }

    if (type !== '' && !stringRegex.test(type)) {
        alert('Le type doit contenir uniquement des caractères alphabétiques.');
        return false;
    }

    // Vérification de la capacite (nombre supérieur à 0)
    if (capacite !== '' && (isNaN(capacite) || capacite <= 0)) {
        alert('Veuillez saisir un nombre valide et supérieur à 0 pour la capacité.');
        return false;
    }

    return true;
}
