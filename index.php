<?php
    session_start();
    include_once('./php/includes/connection.php');
    include_once('./php/includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Express Evo</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/app.css">
    <script src="https://kit.fontawesome.com/09fb47a3eb.js" crossorigin="anonymous"></script>
    <script src="./js/index.js" defer></script>
</head>
<body>
    <header class="header container">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <nav>
                <ul>
                    <li><a href="#"><i class="fa-solid ml-20 fa-shop fa-sm"></i>produits</a></li>
                    <li><a href="#"><i class="fa-solid ml-20 fa-receipt fa-sm"></i>temoignages</a></li>
                    <li><a href="#"><i class="fa-solid ml-20 fa-bell-concierge fa-sm"></i>nos services</a></li>
                    <li><a href="#"><i class="fa-solid ml-20 fa-phone fa-sm"></i>nous contacter</a></li>
                </ul>
            </nav>
        </div>
        
        <i class="fa-solid fa-bars" onclick="openNav()"></i>
        <img class="header_logo" src="https://picsum.photos/60" alt="logo__Express_evo">
        <div class="header__right">
            <div class="header__contact_direct">
                <button class="gradient-button">Contact Direct<i class="fa-solid fa-angle-right fa-sm"></i></button>
                <span><i class="fa-solid fa-phone fa-sm"></i>514-601-4822</span>
            </div>
            <?php 
                if( isset($_SESSION['username'])) {?>
                    <i class="fa-solid fa-user" onclick='openNavRight()'></i>
                <?php } else{?>
                    <a href="php/sign_up.php">
                        <span class="btn">Sign up</span>
                    </a>
                <?php }  
            ?>
        </div>
        <div id="mySidenav_right" class="sidenav_right">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNavRight()">&times;</a>
            <nav>
                <ul>
                    <li><a href="#"><i class="fa-solid ml-20 fa-shopping-cart fa-sm"></i>mon panier</a></li>
                    <li><a href="#"><i class="fa-solid ml-20 fa-star fa-sm"></i>mes commandes</a></li>
                    <li><a href="#"><i class="fa-solid ml-20 fa-scissors fa-sm"></i>proclamer mes 10%</a></li>
                    <li><a href="./php/log_out.php"><i class="fa-solid  ml-20 fa-right-from-bracket fa-sm"></i>se deconnecter</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main container">
        <section class="all_products">
            <?php
                echo displayProducts();
            ?>
            
            
        </section>
    </main>
    <footer>
        
    </footer>
</body>
</html>


