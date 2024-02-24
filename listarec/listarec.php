<?php 
if(isset($_POST['submit'])){
    if(isset($_POST['cerca'])) $s1 = $_POST['cerca']; else{$s1 = '';}
    if(isset($_POST['rec_or_beer'])){
        $s2 = $_POST['rec_or_beer']; 
    }
    else{
        $s2='birre';
     }
   // $s1 = strtolower($s2);
   $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
            user=postgres password=admin") or die('Connessione morta' . pg_last_error());
            if( $s2 == 'birre'){
                 $q_search = "SELECT * from birre WHERE (nome like '%$s1%')
                 or (colore like '%$s1%') or (lievito like '%$s1%')";
                 $res_search = pg_query($q_search);

                

            }
            if($s2 == 'recensioni'){
                $q_search = "SELECT * from recensioni WHERE nome_birra LIKE '%$s1%'";
                $res_search = pg_query($q_search);
            }

            $controller = 1;
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Lista Recensioni</title>
    <link rel="icon" href="../images/profile_placeholder.png" type="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    

    <link rel="stylesheet" href="../testata/css/style.css">
    <link rel="stylesheet" href="../recensione/css/style.css">
    <link rel="stylesheet" href="../profile/css/style.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>

    <?php include "../testata/testata.php" ?> 
   
        <?php 
            $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
            user=postgres password=admin") or die('Connessione morta' . pg_last_error());
            if(isset($_COOKIE['caller'])){
                $caller = $_COOKIE['caller'];
                $q = "SELECT * from recensioni WHERE nome_birra = '$caller' order by id_recensione DESC";
            }
            else{
                $q = "SELECT * FROM recensioni WHERE nome_birra = 
                                                        (SELECT nome FROM birra group by nome ORDER by media_recensioni )";

            }
            $s = pg_query($q);

        ?>

<div class="container">


            <div class="options" id="options"> 
              <h1 style="margin-left:1rem">  
              <form method="POST" nome="form-ricerca" id="form-ricerca" action="listarec.php" > 

              <input name="cerca" type="text" placeholder="Cerca.." class="members"></input>
              <select name="rec_or_beer" id="rec_or_beer" class="members">
					<option value="" disabled selected>Birra o Recensione</option>
					<option value="birre">Birra</option>
					<option value="recensioni">Recensione </option>
				</select>	
              <button id="options" type="submit" name="submit" class="btn"><i class="fas fa-search"></i></button> </h1>
        </options>
            </div>
        <div class = "main-container" id = "vetrina-personale">
            
             <h1 style="margin-left:1rem;"> <?php 
                if( (isset($_COOKIE['caller'])) && (isset($controller)) && ($controller!='1' )){
                    $CCALER = strtoupper($caller);
                    echo"LISTA RECENSIONI PER $CCALER";
                    setcookie("caller", "", time() - 3600);
                }
                else{
                        if(!isset($s2)) $s2 = 'birre';
                        
                        if($s2=='birre')
                        echo"TROVA UNA BIRRA";
                        if($s2=='recensioni')
                        echo"TROVA UNA RECENSIONE";
                        
                    
                }
             ?>  </h1></br>
                <div class = "scheda-amico">
                         

                            <?php 
                            if(isset($controller) && $controller=='1' && $s2=='recensioni'){
                                while( $info = pg_fetch_row($res_search)) {
                                                $_COOKIE['info'] = $info;
    
                                                include "../profile/schedabirra.php";
                                }}
                        elseif(isset($_COOKIE['caller']) && !isset($controller)){
                            
                                        while( $info = pg_fetch_row($s)) {
                                        $_COOKIE['info'] = $info;
                                        include "../profile/schedabirra.php";
                                        
                                    }
                                }
                        elseif( (isset($controller)) && $controller=='1' && $s2=='birre' ){
                            echo"<script>console.log('$s2')</script>;";
                                while( $info = pg_fetch_row($res_search)) {
                                            $_COOKIE['info'] = $info;
                                            include "../profile/schedarecensione.php";
                                }
                                }
                                $controller = '0';
                            
                                
                            ?>
                        </div>                    
        </div>
                            </div>
    
    <script src="js/script.js"></script> 
    <script src="../recensione/js/script.js"></script>
    <script src="../testata/js/script.js"></script>
</body>