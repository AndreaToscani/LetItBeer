
const card = document.getElementById("card");
const login = document.getElementById("blogin");
const registrati = document.getElementById("bsignup");
login.addEventListener("click",flipCard);
registrati.addEventListener("click",flipCard);


function flipCard(){
    card.classList.toggle("flipCard")
    



}