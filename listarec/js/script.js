const card_r = document.getElementById("card_r");
const but_r = document.getElementById("flip_rr");
card_r.addEventListener("click",flipCard_r);
function flipCard_r(){
    const front_r = document.getElementById("front_r");
    card_r.classList.toggle("flipCard_r");
}



  
function swap(){
    const desc = document.getElementById("desc_r");
    const info = document.getElementById("front_r");
    if(window.innerWidth < 560){
            desc.classList.toggle("shame_r");
            info.classList.toggle("shame_r");
    }
}
function swap_r(){
    const desc = document.getElementById("desc_p");
    const info = document.getElementById("sbfrontp");
    if(window.innerWidth < 560){
            desc.classList.toggle("shame_r");
            info.classList.toggle("shame_r");
    }
}
