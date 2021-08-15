<?php
    include "../../config/db.php";

    if(isset($_POST['edit'])){
        $data = (object) array(
            "id"    => $_POST['id'],
            "title" => $_POST['title'],
            "contact_no" => $_POST['contact_no'],
            "address" => $_POST['address'],
            "image" => $_FILES['image']['name']
        );

        if(updateInfo($data)){
            move_uploaded_file($_FILES['image']['tmp_name'], "../../assets/img/web/" . $_FILES['image']['name']);
            header('location: ../../views/admin/webinfo.php?do=Manage');
        }
    }

    function getInfo(){
        $sql = "SELECT * FROM web_info WHERE status = 1 LIMIT 1";
        $result = mysqli_query( dbConnection(), $sql);
        while($item = mysqli_fetch_object($result)){
            return $item;
        }
    }

    function getDetail($id){
        $sql = "SELECT * FROM web_info WHERE id = ". $id;
        $result = mysqli_query( dbConnection(), $sql);
        while($item = mysqli_fetch_object($result)){
            return $item;
        }
    }

    function updateInfo($data){
        $sql = "UPDATE web_info SET `title`='".$data->title."',`contact_no`='".$data->contact_no."',`address`='".$data->address."',`image`='".$data->image."' WHERE id = ". $data->id;
        $result = mysqli_query( dbConnection(), $sql);
        return $result;
    }
?>