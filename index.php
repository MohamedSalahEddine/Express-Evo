<?php include('./includes/header.php'); ?>
<main class="main container">
    <!-- barre de recherche 
    carousel
    categories
        grid 3*2 -->

    <div class="div_recherche container">
        <input type="text" placeholder="Rechercher un produit">
        <div class="div_recherche__categories">
            <span>Categories</span>
            <i class="fa-solid fa-arrow-down fa-sm"></i>
        </div>
    </div>
    <section class="all_categories">
        <?php
            echo displayCategories(); 
        ?>
    </section>
   
    <section class="side_cart">
        <div class="side_cart_total">
            <h4 class="h4_total">Total : $<span>1999.99</span></h4>
            <button class="btn_proceed_to_checkout">Aller au paiement</button>
        </div>
        <div class="side_cart_items">

        </div>
    </section>
    <div class="what_we_do">
        <div class="left">
            <h1>Magazinez aux prix les plus compétitifs</h1>
            <p> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit,
                amet consectetur adipisicing elit
            </p>
            <a href="./php/products.php"><button class="btn__primary">Nos produits</button></a>
        </div>
        <img src="./images/bike_delivery.svg" alt="commande">
    </div>
</main>
    
<?php include('./includes/footer.php'); ?>