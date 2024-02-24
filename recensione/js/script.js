function colorBeer_1(){
    if( (document.getElementById('submit_star_1').style.color)=='rgb(231, 234, 0)'){resetColor();}
    else{} document.getElementById('submit_star_1').style.color= "#E7EA00";
   
}
function colorBeer_2(){
    if( (document.getElementById('submit_star_2').style.color)=='rgb(231, 234, 0)'){resetColor();}
    else{} document.getElementById('submit_star_2').style.color= "#E7EA00";
    colorBeer_1();
}
function colorBeer_3(){
    if( (document.getElementById('submit_star_3').style.color)=='rgb(231, 234, 0)'){resetColor();}
   else{} document.getElementById('submit_star_3').style.color= "#E7EA00";
    colorBeer_2();
}
function colorBeer_4(){
   if( (document.getElementById('submit_star_4').style.color)=='rgb(231, 234, 0)'){resetColor();}
    else{}
    document.getElementById('submit_star_4').style.color= "#E7EA00";
    colorBeer_3();
}
function colorBeer_5(){
    document.getElementById('submit_star_5').style.color= "#E7EA00";
    colorBeer_4();
    
}

function resetColor(){
    
   document.getElementById('submit_star_1').style.color= "#000000";
    document.getElementById('submit_star_2').style.color= "#000000";
    document.getElementById('submit_star_3').style.color= "#000000";
    document.getElementById('submit_star_4').style.color= "#000000";
    document.getElementById('submit_star_5').style.color= "#000000";
}



var rating_data = 0;
function prova(){
    alert("Hello! I am an alert box!!");
}
$('#add_review').click(function(){
    document.getElementById('review_modal').style.display ="block";
    $('#review_modal').modal('show');

});

$(document).on('mouseenter', '.submit_star', function(){
    var rating = $(this).data('rating');
    reset_background();
    for(var count = 1; count <= rating; count++)
    {
        $('#submit_star_'+count).addClass('text-warning');
    }
});

function reset_background()
{
    for(var count = 1; count <= 5; count++)
    {
        $('#submit_star_'+count).addClass('star-light');
        $('#submit_star_'+count).removeClass('text-warning');

    }
}

$(document).on('mouseleave', '.submit_star', function(){
    reset_background();
    for(var count = 1; count <= rating_data; count++)
    {
        $('#submit_star_'+count).removeClass('star-light');
        $('#submit_star_'+count).addClass('text-warning');
    }

});

$(document).on('click', '.submit_star', function(){
    
    rating_data = $(this).data('rating');
});
/*
$('#save_review').click(function(){
    var user_review = $('#user_review').val();
    if( user_review == '' )
    {
        alert("Aggiungi valutazione");
        return false;
    }
    else
    {
        $.ajax({
            url:"upload.php",
            method:"POST",
            data:{rating_data:rating_data },
            success:function(data)
            {
                $('#review_modal').modal('hide');
                alert(data);
            }
        })
    }

});*/

function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}



const cardp = document.getElementById("cardp");
const butt = document.getElementById("flip-rec");
butt.addEventListener("click",flipCardp);
function flipCardp(){
    const sbfrontp = document.getElementById("sbfrontp");
    cardp.classList.toggle("flipCardp");
}

