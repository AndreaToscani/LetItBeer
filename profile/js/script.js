
function openpfpicForm(){
    document.getElementById("uploadPfpic").style.display =  "block";
   
}

function closepfpicForm(){
    document.getElementById("uploadPfpic").style.display =  "none";
    
}


    

const card = document.getElementById("card");
const bot = document.getElementById("add_review");
const bot2 = document.getElementById("add_review_small");
const back = document.getElementById("backarrow");
bot.addEventListener("click",flipCard);
back.addEventListener("click",flipCard);
bot2.addEventListener("click",flipCard);
function flipCard(){
    card.classList.toggle("flipCard")
}

function swap(){
  const desc = document.getElementById("desc_p");
  const info = document.getElementById("sbfrontp");
  if(window.innerWidth < 560){
          desc.classList.toggle("shame_r");
          info.classList.toggle("shame_r");
  }
}

function search() {
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('beer_name');
  filter = input.value.toUpperCase();
  ul = document.getElementById("bL");
  li = ul.getElementsByTagName('li');
  
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1 && input.value!="") {
      li[i].style.setProperty("display","block","important");
    } else {
      li[i].style.setProperty("display","none","important")
    }
  }
}
function suggest(){
    ul = document.getElementById("bL");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) { li[i].style.setProperty("display","block");}
}
function hide(e){
    
    input = document.getElementById('beer_name');
    input.value = e.textContent || e.innerText;
    ul = document.getElementById("bL");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
        li[i].style.setProperty("display","none");

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


