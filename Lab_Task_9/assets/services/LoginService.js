// LOGIN FORM VALIDATION
const email         = document.getElementById('emailId');
const password      = document.getElementById('password');
const submitBtn     = document.querySelector('#submitBtn');

let emailVal    = null;
var passwordVal = null;

if(email != null && password != null){
    email.addEventListener('keyup',function(){
        var inputVal = email.value;
        if(inputVal != null || inputVal != ""){
            if( inputVal.includes('@') && inputVal.includes(".com") || inputVal.includes(".io")){
                emailVal = inputVal;
            }
        }
    });
    
    password.addEventListener('keyup',function(){
        var inputVal = password.value;
        if( inputVal.includes('@') || inputVal.includes("$") || inputVal.includes("#") && inputVal.length >= 8 ){
            passwordVal = inputVal;
        }
    });

    // SUBMIT ACTION
    function actionSubmit(event){
        event.preventDefault();
        if( emailVal != null || passwordVal != null ){
            login_validation(emailVal,passwordVal);
        }
    }

    // AJAX FUNCTION
    function login_validation(email, password){
        if((email != null || email != "") && (password != null || password != "")){
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/LoginController.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send("email="+email+"&password="+password+"&submit="+submitBtn.value);
            
            xhttp.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    if(this.responseText != ""){
                        console.log(this.responseText);
                        if(this.responseText == "true"){
                            window.location = "../views/admin/dashboard.php";
                        }
                        else{
                            // document.getElementById('error').innerHTML = "Invalid Information..";
                            // document.getElementById('error').style.color = 'red';
                            // window.location = "../common_pages/login.php";
                            alert("INCORRECT DATA...");
                        }
                    }
                }	
            }
        }
    }

    submitBtn.addEventListener('click', actionSubmit);    
}



function emailCheck(){

}