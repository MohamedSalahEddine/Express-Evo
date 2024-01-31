<?php

    //////////////////////////////////////////////////////////////////////////////////////displayProducts//
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
                    <span class='product_id_hidden'>{$product[0]}</span>
                    <h3 class='product__title'>{$product[1]}</h3>
                    <img class='product__image' src='https://picsum.photos/200/180' alt='{$product[1]}'/>
                    <h5 class='product__price'><span>$</span>{$product[2]}</h5>
                    <p class='product__description'>
                        {$product[4]}
                    </p>

                    <button class='product_add_btn'>Acheter</button>
                </div>";
    }
    //displayProducts/////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////displayCategories//
    function displayCategories() {
        global $conn;
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        $str = "";

        if ($result->num_rows > 0) {
            $categories = $result->fetch_all();

            foreach($categories as $category){
                $str .= displayCategory($category);
            }
            return $str;

        } else {
            echo "no categories found.";
        }
    }

    function displayCategory($category){
        $cleanedCategoryName = str_replace("'", "", $category[1]);
        $php_link = basename($_SERVER['PHP_SELF'], '.php') == "index" ? "/php":"";
        $php_src = basename($_SERVER['PHP_SELF'], '.php') == "index" ? ".":"..";
        return "<a href='.{$php_link}/category?type={$category[1]}'>
                    <div class='category'>
                        <img class='category__image' src='{$php_src}/images/{$category[2]}' alt='{$category[1]}'/>
                        <h3 class='category__title'>{$category[1]}</h3>
                    </div>
                </a>";
    }

    //displayCategories/////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////getProductsByCategory//

    function getProductsByCategory($category) {
        global $conn;
        $sql = "SELECT * FROM products 
        inner join product_category on products.product_id=product_category.product_id 
        inner join categories on product_category.category_id=categories.category_id 
        where categories.name='{$category}'";
        $result = $conn->query($sql);
        $str = "";

        if ($result->num_rows > 0) {
            $products = $result->fetch_all();

            foreach($products as $product){
                $str .= displayProduct($product);
            }
            return $str;

        } else {
            echo "no products by this category found.";
        }
    }

    
    //getProductsByCategory/////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////getAllReviewsWithUserNames//

    function getAllReviewsWithUserNames() {
        global $conn;
        $sql = "SELECT customer_reviews.*, users.username
                FROM customer_reviews
                INNER JOIN users ON customer_reviews.user_id = users.user_id order by customer_reviews.review_date desc";
        $result = $conn->query($sql);
        $html = "";
    
        if ($result->num_rows > 0) {
            $reviews = $result->fetch_all(MYSQLI_ASSOC);
    
            foreach ($reviews as $review) {
                $html .= renderReviewWithUserName($review);
            }
    
            return $html;
        } else {
            return "No reviews found.";
        }
    }

    function renderReviewWithUserName($review) {
        $cleanedComment = htmlspecialchars($review['comment']);
        
        // Convert the rating to star emojis
        $ratingStars = str_repeat('⭐', intval($review['rating']));
    
        $html = "<div class='review'>
                    <p class='review__rating'><strong>Rating:</strong> {$ratingStars}</p>
                    <p class='review__user-name'><strong>User Name:</strong> {$review['username']}</p>
                    <p class='review__comment'><strong>Comment:</strong> {$cleanedComment}</p>
                    <p class='review__date'><strong>Date:</strong> {$review['review_date']}</p>
                </div>";
    
        return $html;
    }
    

    //getAllReviewsWithUserNames/////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////can_comment//

    function can_comment(){
        if(!isset($_SESSION['user_id'])){
            return false;
        }
        global $conn;
        $sql  = "SELECT * from users INNER JOIN customer_reviews 
        on users.user_id=customer_reviews.user_id where customer_reviews.user_id={$_SESSION['user_id']}";
        $result = $conn->query($sql);
        if($result->num_rows > 0 ){
            return false;
        }else{
            return true;
        }
    }

    //can_comment/////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////display_message//

    function display_message($message){
        // echo "<div class='message'>{$message}<i class='fa-solid fa-x' onClick='alert('heyy')'></i></div>";
        echo "<div class='message'>{$message}<i class='fa-solid fa-x' onclick='remove(this)'></i></div>";
    }

    //display_message/////////////////////////////////////////////////////////////////////////////

?>


