// DASHBOARD SIDEVAR ELEMENT SELECTION
const menuBtn = document.querySelector('#btn-sidebar');
const sidebar = document.querySelector('.sidebar');
const home    = document.querySelector('.home_content');

if(menuBtn != null){
    menuBtn.addEventListener('click',function(){
        sidebar.classList.toggle('active');
        home.classList.toggle('active');
    });
}



// LOGIN FORM VALIDATION
const email         = document.getElementById('emailId');
const password      = document.getElementById('password');
const submitBtn     = document.querySelector('#submitBtn');

var emailVal    = null;
var passwordVal = null;

if(email != null && password != null){
    email.addEventListener('keyup',function(){
        var inputVal = email.value;
        if(inputVal != null || inputVal != ""){
            if( inputVal.includes('@') && inputVal.includes(".com")){
                console.log('EMAIL CORRECT');
                emailVal = inputVal;
            }
        }
    });
    
    password.addEventListener('keyup',function(){
        var inputVal = password.value;
        if( inputVal.includes('@') || inputVal.includes("$") || inputVal.includes("#") && inputVal.length >= 8 ){
            console.log('Password CORRECT');
            passwordVal = inputVal;
        }
    });
    
    function actionSubmit(event){
        event.preventDefault();
        if( emailVal != null || passwordVal != null ){
            alert("Login Success");
        }
    }
    submitBtn.addEventListener('click', actionSubmit);    
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

// function validateOfferPrice(){
//     if(offerPriceElem.value != null || offerPriceElem.value != ""){
//         return true;
//     }
//     else{
//         return false;
//     }
// }

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

function saveProduct(event){
    event.preventDefault();
    if(validateTitle() && validateCategory() && validateRegularPrice() && validateSkuCode() && validateFeaturedItem() && 
        validateStatus() && validateTags() && validateFile() && validateQuantity() && validateShortDesc() && validateDesc()){
            alert("All Details Correct...");
            console.log(
                validateTitle() + "\n" + validateCategory() + "\n" + validateRegularPrice() + "\n" + validateSkuCode() + "\n" + validateFeaturedItem() + "\n" + 
                validateStatus() + "\n" + validateTags() + "\n" + validateFile() + "\n" + validateQuantity() + "\n" + validateShortDesc() + "\n" + validateDesc()
            );
    }
}

if(addProductElem != null){
    titleElem.addEventListener('focusout',validateTitle);        
    categoryElem.addEventListener('focusout',validateCategory);   
    regularPriceElem.addEventListener('focusout',validateRegularPrice);      
    // offerPriceElem.addEventListener('focusout',validateOfferPrice);        
    skuCodeElem.addEventListener('focusout',validateSkuCode);           
    featured_ItemElem.addEventListener('focusout',validateFeaturedItem);     
    statusElem.addEventListener('focusout',validateStatus);           
    tagsElem.addEventListener('focusout',validateTags);              
    productImgElem.addEventListener('focusout',validateFile);        
    productImgElem.addEventListener('change', onfileSelect);       
    quantityElem.addEventListener('focusout',validateQuantity);          
    s_descElem.addEventListener('focusout',validateShortDesc);           
    descriptionElem.addEventListener('focusout',validateDesc); 

    addProductElem.addEventListener('click',saveProduct);        
}


// FORGOT PASSWORD VALIDATION
const checkEmail = document.getElementById('checkEmail');
var check = null;
if(checkEmail != null){
    checkEmail.addEventListener('keyup',function(){
        var inputVal = checkEmail.value;
        if(inputVal != null || inputVal != ""){
            if( inputVal.includes('@') && inputVal.includes(".com")){
                check = inputVal;
            }
        }
    });
    
    document.getElementById('searchEmail').addEventListener('click',function(event){
        event.preventDefault();
        if(check != null){
            alert("Email Correct"); 
        }
    });
}

// PROFILE UPDATE VALIDATION
const nameElem       = document.getElementById('name');
const emailElem      = document.getElementById('email');
const phoneElem      = document.querySelector('#phone');
const addressElem    = document.querySelector('#address');
const mobileElem     = document.querySelector('#mobile');
const updateProfileElem = document.querySelector('#updateProfile');

function validateName(){
    if(nameElem.value == null || nameElem.value == "" && nameElem.value.length <= 3 ){
        if(nameElem.classList.contains('is-valid')){
            nameElem.classList.remove('is-valid');
        }
        nameElem.classList.add('is-invalid');
        return false;
    }

    if(nameElem.classList.contains('is-invalid')){
        nameElem.classList.remove('is-invalid');
    }
    nameElem.classList.add('is-valid');
    return true;
}

function validateEmailP(){
    if(emailElem.value == null || emailElem.value == "" && emailElem.value.length <= 3 ){
        if(emailElem.classList.contains('is-valid')){
            emailElem.classList.remove('is-valid');
        }
        emailElem.classList.add('is-invalid');
        return false;
    }
    
    if(emailElem.value != null || emailElem.value != ""){
        if( emailElem.value.includes('@') && emailElem.value.includes(".com")){
            emailElem.classList.add('is-valid');
            return true;
        }
    }
}

function validatePhone(){
    if(phoneElem.value == null || phoneElem.value == "" && phoneElem.value.length <= 10  ){
        if(phoneElem.classList.contains('is-valid')){
            phoneElem.classList.remove('is-valid');
        }
        phoneElem.classList.add('is-invalid');
        return false;
    }

    if(phoneElem.classList.contains('is-invalid')){
        phoneElem.classList.remove('is-invalid');
    }
    phoneElem.classList.add('is-valid');
    return true;
}

function validateAddress(){
    if(addressElem.value == null || addressElem.value == "" && addressElem.value.length <= 3 ){
        if(addressElem.classList.contains('is-valid')){
            addressElem.classList.remove('is-valid');
        }
        addressElem.classList.add('is-invalid');
        return false;
    }

    if(addressElem.classList.contains('is-invalid')){
        addressElem.classList.remove('is-invalid');
    }
    addressElem.classList.add('is-valid');
    return true;
}

function validateMobile(){
    if(mobileElem.value == null || mobileElem.value == "" && mobileElem.value.length <= 10 ){
        if(mobileElem.classList.contains('is-valid')){
            mobileElem.classList.remove('is-valid');
        }
        mobileElem.classList.add('is-invalid');
        return false;
    }

    if(mobileElem.classList.contains('is-invalid')){
        mobileElem.classList.remove('is-invalid');
    }
    mobileElem.classList.add('is-valid');
    return true;
}

if(updateProfileElem != null){
    updateProfileElem.addEventListener('click',function(event){
        event.preventDefault();
        if(validateName() && validateEmailP() && validatePhone() && validateAddress() && validateMobile()){
            alert("All Details Correct...");
        }
    });
}