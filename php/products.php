<?php include('../includes/header.php'); ?>
<main class="main container">
    <h2>Categories </h2>
    <section class="all_categories">
        <?php
            echo displayCategories();
            echo displayCategories();
        ?>
    </section>
    <h2 class="all_products_title">All products </h2>
    <section class="all_products">
        <?php
            echo displayProducts();
        ?>
    </section>
    
</main>
<?php include('../includes/footer.php'); ?>