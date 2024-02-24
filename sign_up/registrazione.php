<?php
     if(isset($_POST['reg'])){

        $dbconn = pg_connect("host=localhost port=5432 dbname=LetItBeer
        user=postgres password=admin") or die('Connessione morta' . pg_last_error());

        function valid_email($str) {
            return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        }
    
    


        $name = $_POST['nome'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $surname = $_POST['cognome'];
        $surname = filter_var($surname, FILTER_SANITIZE_STRING);

        $username = $_POST['username'];
        $username = filter_var($username, FILTER_SANITIZE_STRING);

        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $password = md5($_POST['pass']);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $password1 = md5($_POST['confpass']);
        $password1 = filter_var($password1, FILTER_SANITIZE_STRING);

        $query_check_username = "SELECT * FROM utenti WHERE username = '$username'";
        $result_username = pg_query($query_check_username);
        $query_check_email = "SELECT * FROM utenti WHERE email = '$email'";
        $result_email = pg_query($query_check_email);

        if($password != $password1){ $message[] = 'le password non coincidono'; }
        else if(pg_num_rows($result_username) > 0){
                $message[] = 'username già in uso';
        }
        else if(!valid_email($email)){
            $message[] = 'formato email non corretto';
        }
        else if(pg_num_rows($result_email) > 0){
            $message[] = 'email già in uso';
        }
        else {
        $query = "INSERT INTO utenti (username , nome , cognome , password , email) VALUES ('$username' , '$name' , '$surname' , '$password' , '$email') ";
        $result = pg_query($query) or die('Inserimento Fallito' . pg_last_error());
        }
        $message[] = "Registrazione avvenuta con successo";
        header("Location: ../login/login.php");
     }
?>



        <section class = "form-container">
            <form action="" method="post" enctype="application/x-www-form-urlencoded">
             <h3>Registrati</h3>
             <input type="text" required placeholder="Nome" class="box" name="nome" >  
             <input type="text" required placeholder="Cognome" class="box" name="cognome">
             <input type="text" required placeholder="Username" class="box" name="username">
             <input type="email" required placeholder="example@email.com" class="box" name="email">
             <input type="password" required placeholder="password" class="box" name="pass">
             <input type="password" required placeholder="confirm password" class="box" name="confpass">
             <button class="btn" id="bsignup"> Hai già un account? Fai il login </button> 
             <input type="submit" name="reg" value="Regisrati" class="btn" >
            </form>
    
        </section>


       