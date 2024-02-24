<?php 
    $infoo = $_COOKIE['info'];
    $id = $infoo[0];
    $nomer = $infoo[1];
    $valr = (int)$infoo[7];
    
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
    user=postgres password=admin") or die('Connessione morta' . pg_last_error());
    $qq = "SELECT * from recensioni WHERE nome_birra = '$nomer' ";
    $sd = pg_query($qq);
    if($sd){ $i = pg_fetch_row($sd); $fotor = $i[9];} else{}
   
?>



<div class = "vetrina" onclick="red(this)" id='<?php echo"$nomer" ?>'>
<div class = "scheda-birra-ristretta">
            <h3><?php echo"$nomer </h3>";
            echo"<img src = '".$fotor."''>"; ?>
            <h3><?php 
            for($i = 0;$i<$valr;$i++){
                echo'<i  class="fa-solid fa-beer-mug-empty star-light submit_star mr-1" style="color:yellow"></i>';
            }
            for($i=0;$i<5-$valr;$i++)   {echo'<i  class="fa-solid fa-beer-mug-empty star-light submit_star mr-1" "></i>';}
        ?></h3>  
 </div>
</div>