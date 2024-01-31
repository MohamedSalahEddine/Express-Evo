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
    <h2 class="all_products_title">All products </h2>
    <section class="all_products">
        <?php
            echo displayProducts();
        ?>
    </section>
    <section class="side_cart">
        <div class="side_product">
            <img class="side_product__image" src="https://picsum.photos/200" alt="your_product_image_alt_here">
            <div class="side_product_right">
                <span class="side_product_id_hidden">12</span>
                <h3 class="side_product__title">iphone 15</h3>
                <h5 class="side_product__price">15.99</h5>
                <div>
                    <i class="fa-solid fa-chevron-up"></i>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <button class="side_product_remove_btn" onclick="remove_from_sideCart()">retirer</button>
            </div>
        </div>

    </section>
</main>
<?php include('../includes/footer.php'); ?>