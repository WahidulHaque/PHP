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