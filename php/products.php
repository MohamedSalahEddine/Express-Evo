<?php include('../includes/header.php');
    if(isset($_POST['productId'])){
        $productId = $_POST['productId'];
        $sql ="INSERT INTO `order_items` ( `order_id`, `product_id`, `quantity`)  VALUES ( '1', '$productId', '7')";
        if($conn->query($sql)){
            echo "nice";
        }
    }
?>
<main class="main container">
    <h2>Categories </h2>
    <section class="all_categories">
        <?php
           echo displayCategories(); 
        ?>
    </section>
    <h2 class="all_products_title">Tous les produits </h2>
    <section class="all_products">
        <?php
            echo displayProducts();
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
