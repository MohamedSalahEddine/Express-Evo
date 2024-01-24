<?php include('../includes/header.php'); ?>
<?php
    if(isset($_POST["add_review"])){
        $rating = $_POST["rating"];
        $comment = $_POST["comment"];
        $user_id = $_SESSION["user_id"];
        $sql = "INSERT into customer_reviews(user_id, rating, comment, review_date)
        values ($user_id, $rating, '$comment', NOW())";
        if($conn->query($sql) === true){
            display_message("Merci d'avoir partagé votre avis!");
        }
    }
?>
<main class="main container">
    <div class="services">
        
    </div>
    <div class="reviews">
        <h2>L'avis de nos clients</h2>
        <?php if(can_comment() == true){?>
            <div class='review review_blurry'>
                <div class="blur">
                    <p class='review__rating'><strong>Rating:</strong>⭐⭐⭐⭐⭐</p>
                    <p class='review__user-name'><strong>User Name:</strong> UserName</p>
                    <p class='review__comment'><strong>Comment:</strong> Lorem ipsum dolor sit amet consectetur,
                                                                        adipisicing elit. Sit doloribus distinctio 
                                                                        recusandae! Voluptatem suscipit soluta dolore 
                                                                        deleniti veniam, perspiciatis dignissimos.
                    </p>
                    <p class='review__date'><strong>Date:</strong> 2024-01-19 12:30:00</p>
                </div>
                <i class="fa-solid add_review_icon fa-plus"></i>
            </div>
            <div class="div_add_review hide">
                <h2>Votre avis</h2>
                <form action="" method="post">
                    <label for="form__rating">Rating:</label>
                    <input type="number" name="rating" id="form__rating" min="1" max="5" required>

                    <label for="form__comment">Comment:</label>
                    <textarea name="comment" id="form__comment" rows="4" required></textarea>

                    <input class="btn__primary" type="submit" name="add_review">Submit Review</input>
                </form>
            </div>
        <?php }?> 
        
        <?php
            echo getAllReviewsWithUserNames();
        ?>
    </div>
</main>
    
<?php include('../includes/footer.php'); ?>

