function verify() {


    var f = document.getElementById("f");
    var f2 = document.getElementById("f2");
    
    var path = f.path.value;
    if (path.length ==0) {
        alert("you must  enter a valid path ( at least 2 caracters)");
        return false;
    }

    

    var patient = f.pat;
    var selectedValue = patient.options[patient.selectedIndex].value;
    if (selectedValue=="no" ){
        alert("you must choose a patient");
        return false;
    }
    
    var categorie = f.cat;
    var selectedValue = categorie.options[categorie.selectedIndex].value;
    if (selectedValue=="no" ){
        alert("you must choose a categorie");
        return false;
    }

    var categorie = f2.categorie.value;
    if (categorie.length==0) {
        alert("you must  enter a valid categorie ( at least 2 caracters)");
    }

    
    alert("valide");
    return true; 
}
