<?php include('./includes/header.php'); ?>
<main class="main container">
    
    <div class="div_recherche container">
        <input type="text" name="search_input" placeholder="Rechercher un produit">
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
   
    <?php
        include('./includes/side_cart.php');
    ?>

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