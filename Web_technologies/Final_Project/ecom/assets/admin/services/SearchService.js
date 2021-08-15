const searchField = document.querySelector('.search');

if(searchField != null){
    const searchAction = function(event){
        let input = searchField.value;
        if(event.keyCode === 13){
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../../../controller/admin/ProductController.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send("search="+input+"&type=ajax");
    
            xhttp.onreadystatechange = function (){
                console.log(this.status);
                if(this.readyState == 4 && this.status == 200){
                    if(this.responseText != ""){
                        const jsonData = JSON.parse(this.responseText);
                        if(jsonData.success == true){
                            document.querySelector('#productsList').innerHTML = jsonData.content;
                            document.querySelector('#tbl-title').innerHTML = "Search result for : " + jsonData.searchData;
                            document.querySelector('.s_data').innerHTML = jsonData.searchData;
                        }
                        else{
                            // window.location = "../../dashboard.php";
                        }
                    }
                }	
            }
        }
    }
    searchField.addEventListener('keyup',searchAction);
}