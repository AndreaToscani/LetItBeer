<?php 
    $infoo = $_COOKIE['info'];
    $valr = $infoo[2];
    $fotor = $info[9];
    $commentor = $info[3];
    $lievitor = $info[5];
    $colorer = $info[6];
    $alcoolr = $info[7];
    $nomer = $info[8];
    $un = $info[1];
    $placeholder = "../images/beer_placeholder.png";
    
?>





<div class = "vetrina-pers cardp sch_birra" id="cardp" onclick="swap_r()">
        <div class = "scheda-birra frontp" id="sbfrontp">
        
            <h3><?php echo"$nomer </h3>";
            echo"<img src = '".$fotor."''>"; ?>
            <h3><?php 
                for($i = 0;$i<$valr;$i++){
                    echo'<i  class="fa-solid fa-beer-mug-empty star-light submit_star mr-1" style="color:yellow"></i>';
                }
                for($i=0;$i<5-$valr;$i++)   {echo'<i  class="fa-solid fa-beer-mug-empty star-light submit_star mr-1" "></i>';}
            ?></h3> 
        </div>

        <div class = "descrizione sch_rec shame_r" id="desc_p">
            <div class="backp">
                <h3><i class="fa-solid fa-table-columns"></i> Descrizione:</h3>
                <hr class="dotted">
                <?php 
                    echo"<b>Lievito:</b> $lievitor";
                    echo"</br><b>Colore:</b> $colorer";
                    echo"</br><b>Alcool:</b> $alcoolr";echo"%";
                ?> <hr class="dotted">
                <h2><i class="fa-solid fa-comment-dots"></i> Commento:</h2>
                <hr class="dotted">
                <textarea disabled class="commento"><?php echo $commentor;?></textarea>
                </div>
        </div>
</div>