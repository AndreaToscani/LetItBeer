<?php 

if (!empty($_COOKIE["cookie"])) { 
        $lop = 'Profilo';
        $link = "../profile/user.php";
    }
else {
    $lop = 'Login';
    $link = "../login/login.php";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="../images/profile_placeholder.png" type="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../testata/css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/schedabirraristretta.css">
 
</head>
<body>

<?php include "../testata/testata.php" ?> 

    <div class="home-bg">
        <section class = "home" id = "home">
            <div class="content">   
                <h3>Let it Beer</h3>
                <p>Prima volta qui?</p>
                <a href = "../listarec/listarec.php" class = "btn"><i class="fa-solid fa-beer-mug-empty"></i> Birretta? </a>
            </div>
           </section>
    </div>
    <!--sezione home fine-->

    <!--sezione about--> 

    <section class="about" id = "about" >
        <div class = "spiegazione">
            <h3>Benvenut* nel nostro Pub virtuale</h3>
            <p>So che hai sete e stai cercando qualcosa di nuovo, 
                qui potrai trovare consigli, idee e pareri che possono 
                suggerirti la prossima birra che amerai. 
            </p><br>
            <p> Se ti registri avrai sempre una nuova idea!</p>

            <a href = "../login/login.php" class = "btn"><i class="fa-regular fa-user"></i> Registrati </a>
            <a href = "<?php echo "$link" ?>" class = "btn"><i class="fa-solid fa-user"></i><?php echo "   $lop" ?> </a>


            <div class="content"> 
                <h2>Se è la birra che cerchi, qui troverai molto di più</h2>
            </div>

        </div>

    </section>
  <?php
  
        $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
            user=postgres password=admin") or die('Connessione morta' . pg_last_error());
        if(isset($_COOKIE['cookie']))$u = $_COOKIE['cookie'];
        $q = "SELECT * from birre order by id_birra DESC ";
        $s = pg_query($q);

  

  ?>




    <!-- VETRINA -->
    <div class = "vetrina-container" id = "vetrina">
        <h1>VETRINA:</h1> </br>
    
        <?php 
    
            $nr = pg_num_rows($s);
            $d = (int)($nr/4);
            $info = "a";
            for($i=0;$i<$d && $info;$i++){
                $count = 0;
                echo" <div class = 'wrapper-scheda'>";
                while( ($info = pg_fetch_row($s)) && ($count<4)) {
                    $count = $count+1;
                    $_COOKIE['info'] = $info;
                    
                   
                    include "../profile/schedabirraristretta.php";
                    
                
                } 

                echo" </div>";
            }
       ?>

                    
    </div> </br>

    <script src="../testata/js/script.js"></script>
    <script src="js/script.js"></script> 
</body>