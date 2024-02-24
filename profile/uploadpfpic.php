<?php 
       $target_dir = "pfpics/";
   

       if(isset($_POST["submit"])){


        $target_file = $target_dir . basename($_FILES["pfpic"]["name"]);
        $u = $_COOKIE['cookie'];
        if(move_uploaded_file($_FILES["pfpic"]["tmp_name"], $target_file)){
            $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
            user=postgres password=admin") or die('Connessione morta' . pg_last_error());
            $q = "UPDATE utenti SET pfpic = '$target_file' WHERE username = '$u'";
            $result = pg_query($q) or die('Update profile picture fallito' . pg_last_error());
           header("Location: user.php");
        }
       }

?>