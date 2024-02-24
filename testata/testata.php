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


<header class="header">
    <section class="flex">
         
        <a href="../index/index.php#home" class="logo"><img src="../images/logo.PNG" alt=""></a>
        
        <nav class="navbar">
            <a href="../index/index.php#home">
                <i class="fa-solid fa-house"></i>    Home
            </a>
            <a href="../index/index.php#vetrina">
            <i class="fas fa-image"></i> Vetrina
            </a>
            <a href="<?php echo "$link" ?>" id="login">
            <i class="fa-solid fa-user"></i><?php echo "$lop" ?>
            </a> 

        </nav>
        
        <div id="menu-btn" class="fas fa-bars"></div>
    
    </section> 
 </header>