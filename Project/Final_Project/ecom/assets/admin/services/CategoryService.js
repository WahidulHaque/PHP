// GET ALL PRODUCTS ON PAGE LOAD
const loadCategoriesOnProductCreate = function() {
    var xhttp_cat = new XMLHttpRequest();
    xhttp_cat.open('POST', '../../controller/admin/CategoryController.php', true);
    xhttp_cat.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp_cat.send("dataCat=allCat&type=ajax");

    xhttp_cat.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            if(this.responseText != ""){
                const jsonData = JSON.parse(this.responseText);
                console.log(jsonData.cat_content);
                if(jsonData.status == true){
                    document.querySelector('#category').innerHTML   = jsonData.cat_content;
                }
            }
        }	
    }
}


// GET ALL PRODUCTS ON PAGE LOAD
const loadAll = function() {
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/admin/CategoryController.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("cat_all=allCat&type=ajax");

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                console.log(this.responseText)
                const jsonData = JSON.parse(this.responseText);
                if(jsonData.success == true){
                    if(document.querySelector('#categoryList') != null){
                        document.querySelector('#categoryList').innerHTML   = jsonData.content;
                    }
                }
            }
        }	
    }
}


if(document.querySelector('#category') != null){
    loadCategoriesOnProductCreate();
}
else if(document.querySelector('#categoryList') != null){
    loadAll();
}