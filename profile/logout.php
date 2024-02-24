<?php
       setcookie ("cookie", "", time()-3600, "/");
        header('Location: ../index/index.php');
?>