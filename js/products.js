let side_cart = document.querySelector('.side_cart');
let product_add_btns = document.querySelectorAll('.product_add_btn');

for(let product_add_btn of product_add_btns){
    product_add_btn.addEventListener('click', func_product_add_btn);
}

function func_product_add_btn(e){
    let product_div = e.target.parentNode;
    let product_id = product_div.querySelector(".product_id_hidden").innerText
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'products.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            // let response = JSON.parse(xhr.responseText);
            // console.log('response from php : '+ response);
        }else{
            console.log('error : '+ xhr.statusText);
        }
    }
    xhr.send('productId='+product_id);
    let product_obj = extract_data(product_div);
    add_to_cart(product_obj);
}

function add_to_cart(product){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let already_added = cart.some(item => item.product_id === product.product_id);
    if(!already_added){
        cart.push(product)
        localStorage.setItem('cart', JSON.stringify(cart));
        side_cart.innerHTML = display_products();
    }else{
        alert('produit déja présent dans le panier');
    }
}

function display_products(){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let str = "";
    for(let product of cart){
        let {product_id, product__title, product__image, product__price, product__description} = product;
        str += `<div class='product'>
                    <span class='product_id_hidden'>${product_id}</span>
                    <h3 class='product__title'>${product_id}</h3>
                    <img class='product__image' src='${product__image}' alt='${product__image}'/>
                    <h5 class='product__price'>${product__price}</h5>
                    <button onclick='remove_from_sideCart()' class='product_remove_btn'>retirer</button>
                </div>`
    }
    return str;
}

function remove_from_sideCart(e){
    let div_product_side = e.target.parentNode;
    let product_id =  div_product_side.querySelector('.product_id_hidden');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let exists_in__cart = cart.some(item => item.product_id === product_id);
    if(exists_in__cart){
        
    }
    div_product_side.remove();
}

function extract_data(product_obj){
    let product_id = product_obj.querySelector('.product_id_hidden').innerText;
    let product__title = product_obj.querySelector('.product__title').innerText;
    let product__image = product_obj.querySelector('.product__image').src;
    let product__price = product_obj.querySelector('.product__price').innerText;
    let product__description = product_obj.querySelector('.product__description').innerText;
    return {
        product_id           : product_id          ,
        product__title       : product__title      ,
        product__image       : product__image      ,
        product__price       : product__price      ,
        product__description : product__description
    }
}