<?php include('../includes/header.php');
    if(isset($_POST['productId'])){
        $productId = $_POST['productId'];
        $sql ="INSERT INTO `order_items` ( `order_id`, `product_id`, `quantity`)  VALUES ( '1', '$productId', '7')";
        if($conn->query($sql)){
            echo "nice";
        }else{
            echo "bad";
        }
    }
?>
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
    <section class="side_cart">
        
    </section>
</main>
<?php include('../includes/footer.php'); ?>