<?php
    $target_dir = "../recensione/uploads/";
   
   
    if(isset($_POST["submit"])){

      

            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            

            $rate = $_POST["rate"];
            $beer_name=$_POST["beer_name"];
            
            if(isset($_POST["select_beer_yeast"])) $select_beer_yeast=$_POST["select_beer_yeast"]; else  $select_beer_yeast="";
            $select_beer_color=$_POST["select_beer_color"];
            if(isset( $_POST["content"])) $content = $_POST["content"]; else $content = "-1";
            if(isset($_POST["user_notes"])) $user_notes = $_POST["user_notes"]; else $user_notes = "";
            if(!isset($_COOKIE['cookie'])){
                alert("Errore nell'inserimento");
                header("Location: ../profilo/user.php");
            }
            $u = $_COOKIE['cookie'];
            

                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
                        #inserimento recensione
                        $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
                        user=postgres password=admin") or die('Connessione morta' . pg_last_error());
                        $q="INSERT INTO recensioni (nome_birra , username , valutazione , commento , lievito , colore , alcool , foto)
                        values ('$beer_name', '$u' , '$rate', '$user_notes' , '$select_beer_yeast' ,'$select_beer_color' , '$content' , '$target_file'  )";
                        $result = pg_query($q) or die('Inserimento fallito' . pg_last_error());


                        #controllo se la birra è presente già nel db
                        $q="SELECT * FROM birre WHERE nome = '$beer_name' LIMIT 1";
                        $result = pg_query($q) or die('Inserimento recensione fallito' . pg_last_error());
                        $r = pg_fetch_array($result);
                        if(pg_num_rows($result)>0) { #la birra è presente
                            $new_n_recensioni = $r['n_recensioni']+1;
                            $new_valutazione_tot = $r['valutazione_tot']+$rate;
                            $new_media_recensioni = $new_valutazione_tot / $new_n_recensioni;
                            $id_birra = $r['id_birra'];
                            $q = "UPDATE birre SET 
                                    n_recensioni = '$new_n_recensioni' , 
                                    valutazione_tot = '$new_valutazione_tot' ,
                                    media_recensioni = '$new_media_recensioni'
                                    WHERE id_birra = '$id_birra'";
                             $result = pg_query($q) or die('update info fallito' . pg_last_error());
                            }
                        else{ #la birra non è presente allora viene inserita
                            $q = "INSERT INTO birre (nome,gradazione,lievito,valutazione_tot,
                            n_recensioni,colore,media_recensioni) VALUES 
                            ('$beer_name','$content','$select_beer_yeast',
                            '$rate','1','$select_beer_color','$rate')";
                            $result = pg_query($q) or die('Inserimento birra fallito' . pg_last_error());

                        }
                      #  header("Location: ../addRecensione/addRecensione.php");

                       
                     header("Location: ../profile/user.php");
                     echo"<script> alert('Recensione Aggiunta con successo');</script>";
                     }
        }
    
?>


