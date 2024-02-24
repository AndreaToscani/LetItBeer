<?php 
  
  if (empty($_COOKIE["cookie"])) { 
    header("location: ../index/index.php"); 
    }    

    $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
    user=postgres password=admin") or die('Connessione morta' . pg_last_error());
    $u = $_COOKIE['cookie'];
    $q = "select * from utenti where username = '$u'";
    $k = pg_query($q);
    $res = pg_fetch_array($k);
    $username = $res[0];
    $nome = $res[1];
    $cognome = $res[2];
    $data_nascita = $res[3];
    $sesso = $res[4];
    $password = $res[5];
    $email = $res[6];
    $pfpic = $res[7]; 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Profilo</title>
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
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>

    <?php include "../testata/testata.php" ?> 
   
    <div class = "container">

     <div class = "profile-card-container card" id="card">

                <div class = "profile-card front">
                    <div class="form-popup" id="uploadPfpic">
                        <form method="POST" enctype="multipart/form-data" class="form-container" nome="upload-pfpic" id="upload-pfpic" action="uploadpfpic.php" >
                        
                            <table>
                                <tr><td><input name="pfpic" id="pfpic" type="file" accept="image/*" required/></td>
                                <td><i class="fa-solid fa-x" onclick="closepfpicForm()" style="font-size: 1.5rem"></i></td></tr>
                            </table>
                            <button type="submit" class="btn btn-primary" name="submit" id="upload_pfpic" onclick="closepfpicForm()">Invia</button>
                        </form>
                    </div>

                    <h3> <?php if(isset($username)) {echo "$username"; }?> </h3>

                    <?php if($pfpic != null) echo "<img src = '".$pfpic."' width = '150' >";
                        else  echo"<img src = '../images/profile_placeholder.PNG' width = '150'>";
                    ?> </br>

                    <button class="btn" style=" text-align:center" onclick="openpfpicForm()" ><i class="fa-solid fa-pencil"></i></button>
        
            

                    <table class = "sidebar">   
                        <div style="height:20%">
                            <tr><td><button class="btn big" href="javascript:" id="add_review"><i class="fa-solid fa-plus"></i>  Aggiungi Recensione</button>
                            <button class="btn small" href="javascript:" id="add_review_small"><i class="fa-solid fa-plus"></i></button>
                            </td>
                            <td><a  href = "#vetrina-personale"><button class="btn big" id="vp"><i class="fas fa-image"></i>     Vetrina personale</button></a>
                            <a  href = "#vetrina-personale"><button class="btn small" id="vp"><i class="fas fa-image"></i></button></a></td> </tr>
                            <!--<button class="btn" href = "">preferite</button>-->
                            <tr><td>  <button class="btn big" href = "" id="supp"><i class="fa-solid fa-message"></i>  Support</button>
                            <button class="btn small" href = "" id="supp"><i class="fa-solid fa-message"></i></button></td>
                            <td><a href = "logout.php"><button class="btn big" id="lo"><i class="fa-solid fa-arrow-right-to-bracket"></i> Logout</button></a>  
                            <a href = "logout.php"><button class="btn small" id="lo"><i class="fa-solid fa-arrow-right-to-bracket"></i></button></a></td> </tr>
                            </div>
                        </table>    
                    
              

                </div>
                
                <div class="profile-card back">
                    <?php include "../recensione/addRecensione.php" ?> 
                </div>
            
            </div>


        <?php 
                    
            $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
            user=postgres password=admin") or die('Connessione morta' . pg_last_error());
            $u = $_COOKIE['cookie'];
            $q = "SELECT * from recensioni WHERE username = '$u' order by id_recensione DESC LIMIT 5";
            $s = pg_query($q);

        ?>


        <div class = "main-container" id = "vetrina-personale">
            <h1 style="margin-left:1rem;">    VETRINA PERSONALE:</h1></br>
            <div class = "scheda-amico">
                <?php 
                    if( $info = pg_fetch_row($s)){
                        $_COOKIE['info'] = $info;
                        include "schedabirra.php";
                    }
                    else{
                        echo"<h2>Qua Compariranno le tue recensioni</h2>";
                    }
                ?>

                <?php     
                    while( $info = pg_fetch_row($s)) {
                    $_COOKIE['info'] = $info;
                    include "schedabirra.php";
                    }
                ?>
            </div>
        </div></br>
                    
    </div>
    


    <script src="js/script.js"></script> 
    <script src="../recensione/js/script.js"></script>
    <script src="../testata/js/script.js"></script>
</body>