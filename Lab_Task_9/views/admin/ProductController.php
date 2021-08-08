<?php
    include "../db/config.php";
    ob_start();
    
    function fetchProducts(){
        $sql = 'select * from products';
        $db_result = mysqli_query($db, $sql);
        return $db_result;
    }

    function search($search){
        $sql = 'select * from products where name like "%' . $search . '%" 
                or buying_price like "%' . $search . '%" or selling_price like "%' . $search . '%"';
        $db_result = mysqli_query($db, $sql);
        return $db_result;
    }

    function getProduct($id){
        $sql = 'select * from products where id = "' . $id . '"';
        $db_result = mysqli_query($db, $sql);
        return $db_result;
    }

    function updateProduct($id, $data){
        $sql = 'update products set name="' . $data['name'] . '", buying_price="' . $data['buying_price'] . '",
                selling_price="' . $data['buying_price'] . '", status="' . $data['status'] . '" * from products where id = "' . $id . '"';
        $db_result = mysqli_query($db, $sql);
        return $db_result;
    }

    function deleteProduct($id){
        $sql = 'delete from products where id = "' . $id . '"';
        $db_result = mysqli_query($db, $sql);
        return $db_result;
    }

    function insertProduct($data){
        $sql = "INSERT INTO products ('name', 'buying_price', 'selling_price','status') 
                VALUES (" . $data['name'] . ", " . $data['buying_price'] . ", " . $data['selling_price'] . ", " . $data['status'] . ")";;
        $db_result = mysqli_query($db, $sql);
        return $db_result;
    }
    
    ob_end_flush();
?>