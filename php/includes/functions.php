<?php

    function displayProducts() {
        global $conn;
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        $str = "";

        if ($result->num_rows > 0) {
            $products = $result->fetch_all();

            foreach($products as $product){
                $str .= displayProduct($product);
            }
            return $str;

        } else {
            echo "no products found.";
        }
    }

    function displayProduct($product){
        $cleanedProductName = str_replace("'", "", $product[1]);

        return "<div class='product'>
                    <h3 class='product__title'>{$product[1]}</h3>
                    <img class='product__image' src='' alt='{$product[1]}'/>
                    <h5 class='product__title'><span>$</span>{$product[2]}</h5>
                    <p class='product__description'>
                        {$product[4]}
                    </p>

                    <button class='product__btn'>Acheter</button>
                </div>";
    }

?>
