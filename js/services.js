let review_blurry = document.querySelector('.review_blurry');
let div_add_review = document.querySelector('.div_add_review');
let add_review_icon = document.querySelector('.add_review_icon');
if(review_blurry){
    review_blurry.addEventListener('click', function(){
        div_add_review.classList.toggle("hide");
        add_review_icon.classList.toggle("fa-plus");
        add_review_icon.classList.toggle("fa-minus");
    });
}


function remove(e){
    e.parentNode.remove();
}