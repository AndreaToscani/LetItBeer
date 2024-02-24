<?php
    if(isset($_POST['login'])){
        $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
        user=postgres password=admin") or die('Connessione morta' . pg_last_error());

        function valid_email($str) {
            return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        }




        $name = $_POST['username'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $password = md5($_POST['pass']);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        
        $query_check_username = "SELECT password , username FROM utenti WHERE '$name' = username or '$name' = email LIMIT 1";
        $result_username = pg_query($query_check_username);
       
        $pssw = pg_fetch_array($result_username);
       
        if(pg_num_rows($result_username) > 0){
           if($pssw[0] == $password){
              setcookie("cookie",$pssw[1],0,"/");
              header('Location: ../profile/user.php');
           }
           else{
            $message[] = 'User o Email o Password non corretti';
        }
        }   
        else{
            $message[] = 'User o Email o Password non corretti';
        }
    }
   



?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../images/profile_placeholder.png" type="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../testata/css/style.css">  
    <link rel="stylesheet" href="css/style.css">
        
</head>
<body>

<?php    
     if(isset($message)){
         foreach($message as $message){
            echo '
            <div class="message" id="message"> <span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.remove();"></i></div> 
            ';
        }
    }
    unset($message);?>
  
    
    <?php include "../testata/testata.php" ?> 



    <div class="card login" id="card">
             <div class="front">
                    <section class = "form-container">
                        <form action="" method="post" enctype="application/x-www-form-urlencoded">
                            <h3>Login</h3>
                            <input type="text" id="login1" required placeholder="Username o email" class="box" name="username">
                            <input type="password" id="login2" required placeholder="password" class="box" name="pass"></br>
                            <button class="btn"  id="blogin"> Non hai un account? Registrati </button> 
                            <input type="submit" id="login3" name="login" value="Login" class="btn" >
                            
                        </form>
                        
                    </section>
             </div>
            <div class="back signup">
                <?php include "../sign_up/registrazione.php";
                $message[] = "Registrazione avvenuta con successo";?>
            </div>


</div>



    <script src="../testata/js/script.js"></script>
    <script src="js/script.js"></script>
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
     
</body>
</html>