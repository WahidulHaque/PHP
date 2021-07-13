<?php
    include "../db/config.php";
    if(isset($_POST['submit'])){
        $data = array(
            "name"          => $_POST['name'],
            "buying_price"  => $_POST['buying_price'],
            "selling_price" => $_POST['selling_price'],
            "status"        => $_POST['status'],
        );
        
        $sql_2 = "INSERT INTO `products` (name, buying_price, selling_price, status) 
                    VALUES ('" . $data['name'] . "', '" . $data['buying_price'] . "', '" . $data['selling_price'] . "', '" . $data['status'] . "');";
        $db_result = mysqli_query($db, $sql_2);
        
        if($db_result){
            header('location: ../views/index.php');
        }
        else{
            echo "ERROR Inserting...<br> <a href='../views/index.php'>Home</a>";
        }
    }

    if(isset($_POST['update']) && isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];
        $data = array(
            "name"          => $_POST['name'],
            "buying_price"  => $_POST['buying_price'],
            "selling_price" => $_POST['selling_price'],
            "status"        => $_POST['status'],
        );
        
        $sql = 'update products set name="' . $data['name'] . '", buying_price="' . $data['buying_price'] . '",
                selling_price="' . $data['selling_price'] . '", status="' . $data['status'] . '" where id = "' . $id . '"';
        $db_result = mysqli_query($db, $sql);
        
        echo $sql;

        if($db_result){
            header('location: ../views/index.php');
        }
        else{
            echo "ERROR UPDATING...";
        }
    }

    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        
        $sql = 'delete from products where id = "' . $id . '"';
        $result = mysqli_query($db, $sql);
        echo $result . "<br>" . $sql;
        if($result){
            header('location: ../views/index.php');
        }
        else{
            echo "ERROR Deleting...";
        }
    }
?>