<?php 
    include('../includes/header.php');

    if(isset($_POST['insert_product'])){
        // $order_id = 55;
        $order_id = get_order_id();
        $productId = $_POST['productId'];
        $sql ="INSERT INTO `order_items` ( `order_id`, `product_id`, `quantity`)  VALUES ( '$order_id', '$productId', 1)";
        if($conn->query($sql)){
            echo "nice";
        }
    }

    if( isset($_POST['quantity_up'])){
        $productId = $_POST['productId'];
        $sql ="UPDATE `order_items` SET quantity = quantity +1 where product_id = {$productId}";
        if($conn->query($sql)){
            echo "nice";
        }
    }

    if( isset($_POST['quantity_down'])){
        $productId = $_POST['productId'];
        $sql ="UPDATE `order_items` SET quantity = quantity -1 where product_id = {$productId}";
        if($conn->query($sql)){
            echo "nice";
        }
    }
    if( isset($_POST['quantity_input']) && isset($_POST['quantity'])){
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];
        $sql ="UPDATE `order_items` SET quantity = {$quantity}  where product_id = {$productId}";
        if($conn->query($sql)){
            echo "nice";
        }
    }
    if( isset($_POST['remove_product'])){
        $productId = $_POST['productId'];
        $sql ="DELETE from `order_items` where product_id = {$productId}";
        if($conn->query($sql)){
            echo "nice";
        }
    }

    // if(isset($_POST['koki'])){
    //     $koki = $_POST['koki'];
    //     $sql ="INSERT INTO `order_items` ( `order_id`, `product_id`, `quantity`)  VALUES ( '1', '$productId', '69')";
    // }
    // $input_data = file_get_contents("php://input");
    // // Decode JSON data
    // $data = json_decode($input_data, true);
    // if($data != null){
    //     $sql ="INSERT INTO `order_items` ( `order_id`, `product_id`, `quantity`)  VALUES ( '1', '69', '69')";
    // }
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
    <?php
        include('../includes/side_cart.php');
    ?>
</main>
<?php include('../includes/footer.php'); ?>
