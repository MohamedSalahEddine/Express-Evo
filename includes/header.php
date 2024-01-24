<?php
    session_start();
    include_once('connection.php');
    include_once('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express Evo</title>
    <?php
        $currentPage = basename($_SERVER['PHP_SELF'], '.php');
        $cssFilePath = "{$currentPage}.css";
        $jsFilePath = "{$currentPage}.js";
        $index = false;
        
        if ( $currentPage == "index") {
            echo "<link rel='stylesheet' href=./styles/{$cssFilePath}>";
            echo "<link rel='stylesheet' href='./styles/header.css'>";
            echo "<link rel='stylesheet' href='./styles/footer.css'>";
            echo "<link rel='stylesheet' href='./styles/app.css'>";
            echo "<script src=./js/{$jsFilePath} defer></script>";
            echo "<script src=./js/header.js defer></script>";
            
            $index = true;
        }
        
        if ( $currentPage !== "index") {
            echo "<link rel='stylesheet' href='../styles/{$cssFilePath}'>";
            echo "<link rel='stylesheet' href='../styles/header.css'>";
            echo "<link rel='stylesheet' href='../styles/footer.css'>";
            echo "<link rel='stylesheet' href='../styles/app.css'>";
            echo "<script src=../js/{$jsFilePath} defer></script>";
            echo "<script src=../js/header.js defer></script>";
        }
    ?>
    
    <script src="https://kit.fontawesome.com/09fb47a3eb.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header container">
        <!-------------------------------------- left side nav ---------------------------->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <nav>
                <ul>
                    <li><a href="<?php echo $index ? ".":"..";?>/php/products.php"><i class="fa-solid mr-20 fa-shop fa-sm"></i>produits</a></li>
                    <li><a href="<?php echo $index ? ".":"..";?>/php/testimonials.php"><i class="fa-solid mr-20 fa-receipt fa-sm"></i>temoignages</a></li>
                    <li><a href=""><i class="fa-solid mr-20 fa-bell-concierge fa-sm"></i>nos services</a></li>
                    <li><a href="<?php echo $index ? ".":"..";?>/php/contact.php"><i class="fa-solid mr-20 fa-phone fa-sm"></i>nous contacter</a></li>
                </ul>
            </nav>
        </div>
        <i class="fa-solid fa-bars" onclick="openNav()"></i>
        <!-------------------------------------- logo ---------------------------->
        <a href="<?php echo $index ? "./":"../index.php" ;?>"><img class="header_logo" src="https://picsum.photos/60" alt="logo__Express_evo"></a>
        <!-------------------------------------- header center nav ---------------------------->
        <nav class="header_center_nav">
            <ul>
                <a href="<?php echo $index ? ".":"..";?>/php/products.php"><li>produits</li></a>
                <a href="<?php echo $index ? ".":"..";?>/php/services.php"><li>nos services</li></a>
                <a href="<?php echo $index ? ".":"..";?>/php/contact.php"><li>contact</li></a>
            </ul>
        </nav>
        <!-------------------------------------- header right ---------------------------->
        <div class="header__right">
            <?php
                if(isset($_SESSION['username'])) {?>
                    <i class="fa-solid fa-user" onclick='openNavRight()'></i>
                    <?php }else{?>
                        <a class="a_log_in" href="<?php echo $index ? "./php":".";?>/log_in.php">
                            log in
                        </a>
                    <?php }  
            ?>
            <div class="header__contact_direct">
                <a href="<?php echo $index ? "./php":".";?>/products.php">
                    <button class="btn__primary">
                        Commander
                        <i class="fa-solid ml-20 fa-angle-right fa-sm"></i>
                    </button>
                </a>
            </div>
        </div>
        <!-------------------------------------- right side nav ---------------------------->
        <div id="mySidenav_right" class="sidenav_right">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNavRight()">&times;</a>
            <nav>
                <ul>
                    <li><a href="<?php echo $index ? "./php":".";?>/cart.php"><i class="fa-solid mr-20 fa-shopping-cart fa-sm"></i>mon panier</a></li>
                    <li><a href="#"><i class="fa-solid mr-20 fa-star fa-sm"></i>mes commandes</a></li>
                    <li><a href="#"><i class="fa-solid mr-20 fa-scissors fa-sm"></i>proclamer mes 10%</a></li>
                    <li><a href="<?php echo $index ? "./php":".";?>/log_out.php"><i class="fa-solid  mr-20 fa-right-from-bracket fa-sm"></i>se deconnecter</a></li>
                </ul>
            </nav>
        </div>
    </header>