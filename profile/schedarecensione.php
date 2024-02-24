<?php 
    $infoo = $_COOKIE['info'];
    $valr = $infoo[7];
    //$fotor = $info[9];
    $lievitor = $info[3];
    $colorer = $info[6];
    $alcoolr = $info[2];
    $nomer = $info[1];
    
    $q = "SELECT r.foto  FROM recensioni as r , birre as beeer WHERE '$nomer' = r.nome_birra LIMIT 1";
    $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
            user=postgres password=admin") or die('Connessione morta' . pg_last_error());
    $res_rec = pg_query($q);
    if($res_rec){
        $fotor = pg_fetch_row($res_rec);
        $fotor = $fotor[0];
      
    }
    else{
        $placeholder = "../images/beer_placeholder.png";
        $fotor = $placeholder;
    }

    
?>





<div class = "vetrina-pers card_r" id="card_r" onclick="swap()">
        
        <div class = "scheda-birra front_r info_r" id="front_r">
        
            <h3><?php echo"$nomer </h3>";
            echo"<img src = '".$fotor."''>"; ?>
            <h3><?php 
                for($i = 0;$i<(int)$valr;$i++){
                    echo'<i  class="fa-solid fa-beer-mug-empty star-light submit_star mr-1" style="color:yellow"></i>';
                }
                for($i=0;$i<5-$valr;$i++)   {echo'<i  class="fa-solid fa-beer-mug-empty star-light submit_star mr-1" "></i>';}
            ?></h3> 
        </div>

        <div class = "descrizione desc_r shame_r" id="desc_r" >
            <div class="back_r">
                <h3><i class="fa-solid fa-table-columns"></i> Descrizione:</h3>
                <hr class="dotted">
                <?php 

                    $q = "SELECT count(*) from recensioni WHERE nome_birra = '$nomer'";
                    $res_num = pg_query($q);
                    $num = pg_fetch_row($res_num)[0];

                    $q = "SELECT nome FROM birre WHERE ('$colorer' = colore and '$lievitor' = lievito and nome <> '$nomer') or 
                       ('$lievitor' = lievito and nome <> '$nomer') or ('$colorer' = colore and nome <> '$nomer')";
                    $res_suggest = pg_query($q);
                    if($res_suggest){
                        $suggest = pg_fetch_row($res_suggest)[0]    ;
                    }
                    else{
                        $suggest = "";
                    }

                    echo"<b>Lievito:</b> $lievitor";
                    echo"</br><b>Colore:</b> $colorer";
                    echo"</br><b>Alcool:</b> $alcoolr";echo"%";
                    $qq = round($valr,1);
                    echo"</br><b>Valutazione media:</b> $qq";
                    echo"</br><b>Recensioni su questa birra:</b> $num";
                    if($suggest!="") {echo"</br><b>Birra Simile suggerita: </b>$suggest";}
                ?> 
                </div>
        </div>
</div>