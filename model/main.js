// contact
var input1 = document.getElementById("input1");
var input2 = document.getElementById("input2");
var input3 = document.getElementById("input3")
var Btn = document.getElementById("submit-btn")

Btn.addEventListener("click",function(){
    if (input1.value==="")
    {alert("Veuillez ecrire votre nom")}

    else if (input2.value === "")
    {alert("veuillez inserer votre email")}

    else if(input3.value ==="")
    {alert("Veuillez insere votre message")}
    
    else{
        alert("Votre message a été envoyer")
        input1.value=""
        input2.value=""
        input3.value=""
    }
})


//login
var input11 = document.getElementById("input11");
var input22 = document.getElementById("input22");
var btn2 = document.getElementById("submit-btn1");

btn2.addEventListener("click",function(){
    if (input11.value === "aziz@gmail.com"  && input22.value === "123456")
    {alert("welcome back aziz")
    window.scrollTo(0,0)
    } 
    else if(input11.value ==="" || input22.value === ""){
        alert("Veuillez remplir tous les champs")
    }
})

let index = 0;
displayImages();
function displayImages() {
  let i;
  const images = document.getElementsByClassName("image");
  for (i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  index++;
  if (index > images.length) {
    index = 1;
  }
  images[index-1].style.display = "block";
  setTimeout(displayImages, 2000); 
}


