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
    <section class="side_cart">
        <div class="side_cart_total">
            <h4 class="h4_total">Total : $<span>1999.99</span></h4>
            <button class="btn_proceed_to_checkout">Payer</button>
        </div>
        <div class="side_cart_items">

        </div>
    </section>
</main>
    
<?php include('../includes/footer.php'); ?>