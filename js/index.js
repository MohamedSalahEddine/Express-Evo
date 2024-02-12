let side_cart = document.querySelector('.side_cart');
let side_cart_items = document.querySelector('.side_cart_items');
display_products()

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
            // console.log('good')

        }else{
            console.log('error : '+ xhr.statusText);
        }
    }
    xhr.send('insert_product&productId='+product_id);
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
        update_total()
    }
}

// removing from sidecart ////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////displaying sidecart products// 


function display_products(){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    side_cart_items.innerHTML = ""
    for(let product of cart){
        render_product(product);
    }
    update_total()
} 

function render_product(product){
    let {product_id, product__title, product__image, product__price, product__description, quantity} = product;
    product__price = product__price.substring(1);

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

    // side_product__sub_total
    const side_product__sub_total = document.createElement('h5');
    side_product__sub_total.classList.add('side_product__sub_total');
        const sub_total_span = document.createElement('span');
        sub_total_span.textContent = (product__price * parseInt(quantity)).toFixed(2);
    side_product__sub_total.textContent=`Sous-total : $`;
    side_product__sub_total.appendChild(sub_total_span)

    // quantity_
    const quantity_input = document.createElement('input');
    quantity_input.classList.add('side_product__number');
    quantity_input.value = quantity;
    quantity_input.addEventListener('input', () => quantity_input.value > 1 && handle_quantity_input(product_id, quantity_input.value));
    quantity_input.addEventListener('input', update_sub_total)

    // quantity_up
    const quantity_up = document.createElement('i');
    quantity_up.classList.add('fa-solid');
    quantity_up.classList.add('fa-chevron-up');
    quantity_up.addEventListener('click', () => handle_quantity_up(product_id));
    quantity_up.addEventListener('click', update_sub_total);

    // quantity_down
    const quantity_down = document.createElement('i');
    quantity_down.classList.add('fa-solid');
    quantity_down.classList.add('fa-chevron-down');
    quantity_down.classList.add('fa-chevron-down');
    quantity_down.addEventListener('click', () => quantity_input.value > 1 && handle_quantity_down(product_id));
    quantity_down.addEventListener('click', update_sub_total);



    // button
    const removeButton = document.createElement('button');
    removeButton.classList.add('side_product_remove_btn');
    removeButton.textContent = 'retirer';
    removeButton.addEventListener('click', remove_from_sideCart); 

    
    productDiv.appendChild(productIdSpan);
    productDiv.appendChild(titleH3);
    productDiv.appendChild(imageImg);
    productDiv.appendChild(priceH5);
    productDiv.appendChild(side_product__sub_total);
    productDiv.appendChild(quantity_up);
    productDiv.appendChild(quantity_down);
    productDiv.appendChild(quantity_input);
    productDiv.appendChild(removeButton);
    side_cart_items.prepend(productDiv);
    // alert(productDiv.innerHTML)

}

// displaying sidecart products//////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////// update_sub_total // 
function update_sub_total(e){
    let quantity = parseInt(e.target.parentNode.querySelector('.side_product__number').value) ;
    let price = parseFloat(e.target.parentNode.querySelector('.side_product__price').textContent);
    let side_product__sub_total_span = e.target.parentNode.querySelector('.side_product__sub_total span')
    if( isNaN(quantity) || quantity < 1){
        e.target.parentNode.querySelector('.side_product__number').value = 1
        side_product__sub_total_span.textContent = price
        update_total()
        return
    }
    let calculated_price = (price * parseInt(quantity)).toFixed(2)
    side_product__sub_total_span.textContent = isNaN(calculated_price) ? "0" : calculated_price;
    update_total()
}
// update_sub_total ////////////////////////////////////////////////////////////////////////////////////////// 


////////////////////////////////////////////////////////////////////////////////////////// handle_quantity_up // 
function handle_quantity_up(product_id){
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'products.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            // let response = JSON.parse(xhr.responseText);
            // console.log('response from php : '+ response);
            // console.log('good')
        }else{
            console.log('error : '+ xhr.statusText);
        }
    }
    xhr.send(`quantity_up&productId=${product_id}`);



    let cart = JSON.parse(localStorage.getItem('cart')) || []
    let index = cart.findIndex( (item) => item.product_id === product_id);
    cart[index].quantity++
    localStorage.setItem('cart', JSON.stringify(cart));
    display_products()
    
}
// handle_quantity_up ////////////////////////////////////////////////////////////////////////////////////////// 

////////////////////////////////////////////////////////////////////////////////////////// handle_quantity_down // 
function handle_quantity_down(product_id){
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'products.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            // let response = JSON.parse(xhr.responseText);
            // console.log('response from php : '+ response);
            // console.log('good')
        }else{
            console.log('error : '+ xhr.statusText);
        }
    }
    xhr.send(`quantity_down&productId=${product_id}`);


    let cart = JSON.parse(localStorage.getItem('cart')) || []
    let index = cart.findIndex( (item) => item.product_id === product_id);
    cart[index].quantity--
    localStorage.setItem('cart', JSON.stringify(cart));
    display_products()
    
}
// handle_quantity_down ////////////////////////////////////////////////////////////////////////////////////////// 

////////////////////////////////////////////////////////////////////////////////////////// handle_quantity_input // 
function handle_quantity_input(product_id, quantity){
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'products.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            // let response = JSON.parse(xhr.responseText);
            // console.log('response from php : '+ response);
            // console.log('good')
        }else{
            console.log('error : '+ xhr.statusText);
        }
    }
    xhr.send(`quantity_input&productId=${product_id}&quantity=${quantity}`);


    let cart = JSON.parse(localStorage.getItem('cart')) || []
    let index = cart.findIndex( (item) => item.product_id === product_id);
    cart[index].quantity = quantity
    localStorage.setItem('cart', JSON.stringify(cart));
    display_products()
    
}
// handle_quantity_input ////////////////////////////////////////////////////////////////////////////////////////// 


////////////////////////////////////////////////////////////////////////////////////////// update_total // 
function update_total(){
    let sub_total_spans = document.querySelectorAll('.side_product .side_product__sub_total span');
    let h4_total_span = document.querySelector('.side_cart .h4_total span');
    let total = 0;
    for(let sub_total_span of sub_total_spans){
        total += parseFloat(sub_total_span.textContent);
    }
    h4_total_span.textContent = total.toFixed(2)
}
// update_total ////////////////////////////////////////////////////////////////////////////////////////// 


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
        product__description ,
        quantity : 1 ,
    }
}

function sum_up_cart(){
    let cart = JSON.parse(localStorage.getItem('cart')) 
    let somme = cart.reduce((current_price, item))
}