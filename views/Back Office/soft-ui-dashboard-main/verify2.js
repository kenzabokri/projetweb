function verify1() {


    var f = document.getElementById("f2");
   
    var categorie = f.categorie.value;
    if (categorie.length==0) {
        alert("you must  enter a valid categorie ( at least 2 caracters)");
        return false;
    }

    
    alert("valide");
    return true; 
}
