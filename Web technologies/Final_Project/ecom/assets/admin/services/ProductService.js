const filterProduct = document.querySelector('#filter_pr');
const addPRoductBtn = document.getElementsByName('addProduct');

// GET ALL PRODUCTS ON PAGE LOAD
if(document.querySelector('#productsList') != null){
    const loadAllProduct = function() {
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../controller/admin/ProductController.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("data=all&type=ajax");
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    const jsonData = JSON.parse(this.responseText);
                    if(jsonData.success == true){
                        document.querySelector('#productsList').innerHTML   = jsonData.content;
                        document.querySelector('#filter_pr').innerHTML      = jsonData.filterList;
                    }
                }
            }	
        }
    }

    loadAllProduct();
}



if(filterProduct != null){
    const filterAction = function(){
        let value = filterProduct.value;
        
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../controller/admin/ProductController.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("filter="+value+"&type=ajax");

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    console.log(this.responseText)
                    const jsonData = JSON.parse(this.responseText);
                    if(jsonData.success == "true"){
                        document.querySelector('#productsList').innerHTML = jsonData.content;
                    }
                    else{
                        document.querySelector('#productsList').innerHTML = jsonData.content;
                    }
                }
            }	
        }
    }

    filterProduct.addEventListener('change',filterAction);
}


/*
*   Product Add Page Validation
*/
const titleElem             = document.getElementById('title');
const categoryElem          = document.getElementById('category');
const regularPriceElem      = document.querySelector('#regular_price');
const offerPriceElem        = document.querySelector('#offer_price');
const skuCodeElem           = document.querySelector('#sku_code');
const featured_ItemElem     = document.querySelector('#featured_item');
const statusElem            = document.querySelector('#status');
const tagsElem              = document.querySelector('#tags');
const productImgElem        = document.querySelector('#productImg');
const quantityElem          = document.querySelector('#quantity');
const s_descElem            = document.querySelector('#s_desc');
const descriptionElem       = document.querySelector('#description');
const addProductElem        = document.querySelector('#addProduct');
const editProductElem       = document.querySelector('#editProduct');
const btnConfirmDeletes     = document.querySelectorAll('.dlt');



function validateTitle(){
    if(titleElem.value == null || titleElem.value == "" && titleElem.value.length == 0){
        if(titleElem.classList.contains('is-valid')){
            titleElem.classList.remove('is-valid');
        }
        titleElem.classList.add('is-invalid');
        return false;
    }
    if(titleElem.classList.contains('is-invalid')){
        titleElem.classList.remove('is-invalid');
    }
    titleElem.classList.add('is-valid');
    return true;
}

function validateCategory(){
    if(categoryElem.value == null || categoryElem.value == "0"){
        if(categoryElem.classList.contains('is-valid')){
            categoryElem.classList.remove('is-valid');
        }
        categoryElem.classList.add('is-invalid');
        return false;
    }
    
    if(categoryElem.classList.contains('is-invalid')){
        categoryElem.classList.remove('is-invalid');
    }
    categoryElem.classList.add('is-valid');
    return true;
}

function validateRegularPrice(){
    if(regularPriceElem.value == null || regularPriceElem.value == ""){
        if(regularPriceElem.classList.contains('is-valid')){
            regularPriceElem.classList.remove('is-valid');
        }
        regularPriceElem.classList.add('is-invalid');
        return false;
    }
    
    if(regularPriceElem.classList.contains('is-invalid')){
        regularPriceElem.classList.remove('is-invalid');
    }
    regularPriceElem.classList.add('is-valid');
    return true;
}

function validateSkuCode(){
    if(skuCodeElem.value == null || skuCodeElem.value == ""){
        if(skuCodeElem.classList.contains('is-invalid')){
            skuCodeElem.classList.remove('is-invalid');
        }
        skuCodeElem.classList.add('is-invalid');
        return false;
    }
    
    if(skuCodeElem.classList.contains('is-invalid')){
        skuCodeElem.classList.remove('is-invalid');
    }
    skuCodeElem.classList.add('is-valid');
    return true;
}

function validateFeaturedItem(){
    if(featured_ItemElem.value == null || featured_ItemElem.value == "X"){
        if(featured_ItemElem.classList.contains('is-valid')){
            featured_ItemElem.classList.remove('is-valid');
        }
        featured_ItemElem.classList.add('is-invalid');
        return false;
    }

    if(featured_ItemElem.classList.contains('is-invalid')){
        featured_ItemElem.classList.remove('is-invalid');
    }
    featured_ItemElem.classList.add('is-valid');
    return true;
}

function validateStatus(){
    if(statusElem.value == null || statusElem.value == "0"){
        if(statusElem.classList.contains('is-valid')){
            statusElem.classList.remove('is-valid');
        }
        statusElem.classList.add('is-invalid');
        return false;
    }

    if(statusElem.classList.contains('is-invalid')){
        statusElem.classList.remove('is-invalid');
    }
    statusElem.classList.add('is-valid');
    return true;
}

function validateTags(){
    if(tagsElem.value == null || tagsElem.value == "" && tagsElem.value.length == 0){
        if(tagsElem.classList.contains('is-valid')){
            tagsElem.classList.remove('is-valid');
        }
        tagsElem.classList.add('is-invalid');
        return false;
    }
    
    if(tagsElem.classList.contains('is-invalid')){
        tagsElem.classList.remove('is-invalid');
    }
    tagsElem.classList.add('is-valid');
    return true;
}

function validateFile(){
    if(productImgElem.files.value == null || productImgElem.files.length == 0){
        if(productImgElem.classList.contains('is-valid')){
            productImgElem.classList.remove('is-valid');
        }
        productImgElem.classList.add('is-invalid');
        return true;
    }
    
    if(productImgElem.classList.contains('is-invalid')){
        productImgElem.classList.remove('is-invalid');
    }
    productImgElem.classList.add('is-valid');
    return true;
}

function onfileSelect(){
    document.getElementById('imgLabel').innerHTML = productImgElem.files[0].name;
    if(productImgElem.classList.contains('is-invalid')){
        productImgElem.classList.remove('is-invalid');
    }
    productImgElem.classList.add('is-valid');
    alert(productImgElem.files[0].name);
}

function validateQuantity(){
    if(quantityElem.value == null || quantityElem.value == ""){
        if(quantityElem.classList.contains('is-valid')){
            quantityElem.classList.remove('is-valid');
        }
        quantityElem.classList.add('is-invalid');
        return false;
    }
    
    if(quantityElem.classList.contains('is-invalid')){
        quantityElem.classList.remove('is-invalid');
    }
    quantityElem.classList.add('is-valid');
    return true;
}

function validateShortDesc(){
    if(s_descElem.value == null || s_descElem.value == "" && s_descElem.value.length <= 4){
        if(s_descElem.classList.contains('is-valid')){
            s_descElem.classList.remove('is-valid');
        }
        s_descElem.classList.add('is-invalid');
        return false;
    }
    
    if(s_descElem.classList.contains('is-invalid')){
        s_descElem.classList.remove('is-invalid');
    }
    s_descElem.classList.add('is-valid');
    return true;
}

function validateDesc(){
    if(descriptionElem.value == null || descriptionElem.value == "" && descriptionElem.value.length >= 15){
        if(descriptionElem.classList.contains('is-valid')){
            descriptionElem.classList.remove('is-valid');
        }
        descriptionElem.classList.add('is-invalid');
        return false;
    }

    if(descriptionElem.classList.contains('is-invalid')){
        descriptionElem.classList.remove('is-invalid');
    }
    descriptionElem.classList.add('is-valid');
    return true;
}

// ADD NEW PRODUCT
function saveProduct(event){
    event.preventDefault();
    if(validateTitle() && validateCategory() && validateRegularPrice() && validateSkuCode() && validateFeaturedItem() && 
        validateStatus() && validateTags() && validateFile() && validateQuantity() && validateShortDesc() && validateDesc()){

            const product = {
                "title"         :  titleElem.value,
                "slug"          :  titleElem.value.toLowerCase(),
                "cat_id"        :  categoryElem.value,
                "regular_price" :  regularPriceElem.value,
                "offer_price"   :  offerPriceElem.value,
                "product_type"  :  1,
                "sku_code"      :  skuCodeElem.value,
                "featured_item" :  featured_ItemElem.value,
                "status"        :  statusElem.value,
                "tags"          :  tagsElem.value,
                "image"         :  productImgElem.files[0],
                "quantity"      :  quantityElem.value,
                "s_desc"        :  s_descElem.value,
                "desc"          :  descriptionElem.value,
            }
    
            var xhttpAdd = new XMLHttpRequest();
            xhttpAdd.open('POST', '../../controller/admin/ProductController.php', true);
            xhttpAdd.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttpAdd.send("product="+ JSON.stringify(product) +"&type=ajax");
            console.log(product);
            xhttpAdd.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                    if(this.responseText != ""){
                        console.log(this.responseText);
                        const jsonData = JSON.parse(this.responseText);
                        if(jsonData.success == true){
                            alert(jsonData.content);
                            window.location = "product.php?do=Manage";
                        }
                        else{
                            alert("Product Not Added Successfully...");
                        }
                    }
                }	
            }
    }
}

// ADD NEW PRODUCT
function editProductAction(event){
    event.preventDefault();
    let product = null;
    if(productImgElem.files.length > 0){
        product = {
            "id"            :  document.getElementById('p_id').value,
            "title"         :  titleElem.value,
            "slug"          :  titleElem.value.toLowerCase().replaceAll(' ', '-'),
            "cat_id"        :  categoryElem.value,
            "regular_price" :  regularPriceElem.value,
            "offer_price"   :  offerPriceElem.value,
            "product_type"  :  (quantityElem.value > 5) ? 1 : 0,
            "sku_code"      :  skuCodeElem.value,
            "featured_item" :  featured_ItemElem.value,
            "status"        :  statusElem.value,
            "tags"          :  tagsElem.value,
            "image"         :  productImgElem.files[0],
            "quantity"      :  quantityElem.value,
            "s_desc"        :  s_descElem.value,
            "desc"          :  descriptionElem.value,
        }
    }
    else{
        product = {
            "id"            :  document.getElementById('p_id').value,
            "title"         :  titleElem.value,
            "slug"          :  titleElem.value.toLowerCase().replaceAll(' ', '-'),
            "cat_id"        :  categoryElem.value,
            "regular_price" :  regularPriceElem.value,
            "offer_price"   :  offerPriceElem.value,
            "product_type"  :  (quantityElem.value > 5) ? 1 : 0,
            "sku_code"      :  skuCodeElem.value,
            "featured_item" :  featured_ItemElem.value,
            "status"        :  statusElem.value,
            "tags"          :  tagsElem.value,
            "quantity"      :  quantityElem.value,
            "s_desc"        :  s_descElem.value,
            "desc"          :  descriptionElem.value,
        }
    }
    

    console.log(JSON.stringify(product));

    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/admin/ProductController.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("upProduct="+ JSON.stringify(product) +"&type=ajax");
    
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                console.log(this.responseText)
                const jsonData = JSON.parse(this.responseText);
                if(jsonData.success == true){
                    alert(jsonData.content);
                    window.location = "product.php?do=Manage";
                }
                else{
                    alert("Product Not Updated Successfully...");
                }
            }
        }	
    }
}

// ADD EVENT LISTENERS FOR EDIT PRODUCT
if(editProductElem != null){
    editProductElem.addEventListener('click',editProductAction);
}

// ADD EVENT LISTENERS FOR ADD NEW PRODUCT
if(addProductElem != null){
    titleElem.addEventListener('focusout',validateTitle);        
    categoryElem.addEventListener('focusout',validateCategory);   
    regularPriceElem.addEventListener('focusout',validateRegularPrice);       
    skuCodeElem.addEventListener('focusout',validateSkuCode);           
    featured_ItemElem.addEventListener('focusout',validateFeaturedItem);     
    statusElem.addEventListener('focusout',validateStatus);           
    tagsElem.addEventListener('focusout',validateTags);              
    productImgElem.addEventListener('focusout',validateFile);        
    productImgElem.addEventListener('change', onfileSelect);       
    quantityElem.addEventListener('focusout',validateQuantity);          
    s_descElem.addEventListener('focusout',validateShortDesc);           
    descriptionElem.addEventListener('focusout',validateDesc); 
    

    if(validateTitle() && validateCategory() && validateRegularPrice() && validateSkuCode() && validateFeaturedItem() && 
        validateStatus() && validateTags() && validateFile() && validateQuantity() && validateShortDesc() && validateDesc()){
        document.getElementsByName('addProduct').classList.remove('disabled');
    }
}

const deleteProductAction = function(event){
    event.preventDefault();
    console.log(event.target.id);
    const p_id = event.target.id.split('_')[1];
    const product_id = document.querySelector(`#pid_${p_id}`).value;
    
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/admin/ProductController.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("delete_id="+ product_id +"&type=ajax");
    
    console.log(product_id);
    
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                const jsonData = JSON.parse(this.responseText);
                if(jsonData.success == true){
                    alert(jsonData.content);
                    window.location = "product.php?do=Manage";
                }
                else{
                    alert("Product Not Deleted Successfully...");
                }
            }
        }	
    }
}

// DELETE PRODUCT
if(btnConfirmDeletes != null){
    
    btnConfirmDeletes.forEach( btn => {
        console.log(btn)
        btn.addEventListener('click', deleteProductAction);
    });
}

