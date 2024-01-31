let side_cart = document.querySelector('.side_cart');

//////////////////////////////////////////////////////////////////////////////////////////// adding to sidecart
let product_add_btns = document.querySelectorAll('.product_add_btn');
for(let product_add_btn of product_add_btns){
    product_add_btn.addEventListener('click', func_product_add_btn);
}

function func_product_add_btn(e){
    let product_div = e.target.parentNode;
    let product_obj = extract_data(product_div);
    let product_id = product_div.querySelector(".product_id_hidden").innerText
    if(!add_to_cart(product_obj)){
        return
    }
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
}

function add_to_cart(product){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let already_added = cart.some(item => item.product_id === product.product_id);
    if(!already_added){
        cart.push(product)
        localStorage.setItem('cart', JSON.stringify(cart));
        display_products();
        return true
    }else{
        alert('produit déja présent dans le panier');
        return false
    }
}

// adding to sidecart ////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////////// removing from sidecart // 


function remove_from_sideCart(e){
    let div_product_side = e.target.parentNode;
    let product_id =  div_product_side.querySelector('.side_product_id_hidden').textContent;
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let exists_in__cart = cart.some(item =>{
        return item.product_id == product_id;
    })
    if(exists_in__cart){
        cart = cart.filter(item => {
            return item.product_id !== product_id
        })
        div_product_side.remove();
        localStorage.setItem('cart', JSON.stringify(cart));
    }
}

// removing from sidecart ////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////displaying sidecart products// 


function display_products(){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    side_cart.innerHTML = ""
    for(let product of cart){
        render_product(product);
    }
}

function render_product(product){
    let {product_id, product__title, product__image, product__price, product__description} = product;

    const productDiv = document.createElement('div');
    productDiv.classList.add('side_product');

    // hidden span 
    const productIdSpan = document.createElement('span');
    productIdSpan.classList.add('side_product_id_hidden');
    productIdSpan.textContent = product_id;

    // h3 
    const titleH3 = document.createElement('h3');
    titleH3.classList.add('side_product__title');
    titleH3.textContent = product__title;

    // img 
    const imageImg = document.createElement('img');
    imageImg.classList.add('side_product__image');
    imageImg.setAttribute('src', product__image);
    imageImg.setAttribute('alt', product__image);

    // h5 
    const priceH5 = document.createElement('h5');
    priceH5.classList.add('side_product__price');
    priceH5.textContent = product__price;

    // button
    const removeButton = document.createElement('button');
    removeButton.classList.add('side_product_remove_btn');
    removeButton.textContent = 'retirer';
    removeButton.addEventListener('click', remove_from_sideCart); 

    
    productDiv.appendChild(productIdSpan);
    productDiv.appendChild(titleH3);
    productDiv.appendChild(imageImg);
    productDiv.appendChild(priceH5);
    productDiv.appendChild(removeButton);
    side_cart.prepend(productDiv);
}

// displaying sidecart products////////////////////////////////////////////////////////////////////////////////////////// 


function extract_data(product_obj){
    let product_id = product_obj.querySelector('.product_id_hidden').innerText;
    let product__title = product_obj.querySelector('.product__title').innerText;
    let product__image = product_obj.querySelector('.product__image').src;
    let product__price = product_obj.querySelector('.product__price').innerText;
    let product__description = product_obj.querySelector('.product__description').innerText;
    return {
        product_id           ,
        product__title       ,
        product__image       ,
        product__price       ,
        product__description 
    }
}

function sum_up_cart(){
    let cart = JSON.parse(localStorage.getItem('cart')) 
    let somme = cart.reduce((current_price, item))
}