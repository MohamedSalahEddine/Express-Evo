<?php include('../includes/header.php'); ?>
<main class="main container">
    <section class="products_by_category">
        <?php
            if(isset($_GET['type'])){
                $type = $_GET['type']; ?>
                <a href="./products.php">
                    <i class="fa-solid fa-caret-left"></i>
                    <h1><?php echo $type; ?></h1>
                </a>
                <div>
                    <?php echo getProductsByCategory($_GET['type']);?>
                </div>
            <?php }
        ?>
    </section>
    <?php
               include('../includes/side_cart.php');

    ?>
</main>
    
<?php include('../includes/footer.php'); ?>