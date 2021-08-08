<?php
    require "CategoryController.php";
    if(isset($_POST['type'])){
        require "../../config/db.php"; //include the database configuration file to connect with database
    }
    else{
        require "../../../../config/db.php"; //include the database configuration file to connect with database
    }
    
    // session_start();                        //start session to store variable data in session

    function getAll(){
        $db = dbConnection();
        $sql_query  = "select * from products";
        $result     = mysqli_query($db, $sql_query);

        return $result;
    }

    function filterProduct($filter){
        $db = dbConnection();
        $sql_query  = "select * from products where cat_id=".$filter;
        $result     = mysqli_query($db, $sql_query);
        $return_arr = array();
        
        if(mysqli_num_rows($result) > 0){
            $markUpData = writeProductTable($result);
            $return_arr = array(
                "content" => $markUpData,
                "success" => true
            );
        }
        
        else{
            $markUpData = writeProductTable(getAll());
            $return_arr = array(
                "content" => $markUpData,
                "success" => true
            );
        }
        return json_encode($return_arr);
    }

    function searchProduct($filter){
        $db = dbConnection();
        $sql_query  = "select * from products where title like '%". $filter ."%'";
        $result     = mysqli_query($db, $sql_query);
        $return_arr = array();
        
        if(mysqli_num_rows($result) > 0){
            $markUpData = writeProductTable($result);
            $return_arr = array(
                "content"       => $markUpData,
                "searchData"    => $filter,
                "success"       => true
            );
        }
        return json_encode($return_arr);
    }

    function getProductById($id){
        $db = dbConnection();
        $sql_query  = "select * from products where id=".$id;
        $result     = mysqli_query($db, $sql_query);
        $product    = null;
        if(mysqli_num_rows($result) > 0){
            while($item = mysqli_fetch_object($result)){
                $product = $item;
            }
        }
        return $product;
    }

    function writeProductTable($data){
        $markUp = "";
        if(isset($data)){
            $sl_product = 1;
            while($item = mysqli_fetch_object($data)){
                $status         = "";
                $featured_item  = "";
                $cat_name       = "";
                $img_path       = (!empty($item->image)) ? "assets/img/products/".$item->image : "";

                if ($item->status == 1) {
                    $status  = '<span class="badge badge-success">Active</span>';
                } else if ($item->status == 0) {
                    $status  = '<span class="badge badge-danger">Inactive</span>';
                }
                
                if ($item->featured_item == 1) {
                    $featured_item  = '<span class="badge badge-success">Featured</span>';
                } else{
                    $featured_item  = '<span class="badge badge-danger">Not Featured</span>';
                }

                $category = getCategory($item->cat_id);
                while($row = mysqli_fetch_object($category)){
                    $cat_name = $row->cat_name;
                }

                $markUp .= '<tr>
                                <td>'. $sl_product++ .'</td>
                                <td>
                                    <img src="'. $img_path .'" alt="">
                                </td>
                                <td>'.$item->title .'</td>
                                <td>'. $cat_name .'</td>
                                <td>'. substr($item->s_desc, 0, 50) .'</td>
                                <td>BDT.'. $item->regular_price .'</td>
                                <td>BDT.'. $item->offer_price .'</td>
                                <td>'. $featured_item .'</td>
                                <td>'. $item->quantity .'Pcs</td>
                                <td>'. $status .'</td>
                                <td>
                                    <a href="" class="btn btn-outline-info" >Edit</a>
                                    <a href="" class="btn btn-outline-danger" >Delete</a>
                                </td>
                            </tr>';
            }
        }
        return $markUp;
    }

    function createProduct($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "INSERT INTO `products` (`title`, `slug`, `s_desc`, `desc`, `quantity`, `regular_price`, `offer_price`, `sku_code`, `product_type`, `tags`, `featured_item`, `status`, `cat_id`, `image`) 
                            VALUES ('". $input->title ."','". $input->slug ."','". $input->s_desc ."','". $input->desc ."',
                            '". $input->quantity ."',". $input->regular_price .",". $input->offer_price .",'". $input->sku_code ."',
                            ". $input->product_type .",'". $input->tags ."',". $input->featured_item .",". $input->status .",
                            ". $input->cat_id .",'". $input->image ."');";
            
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function deleteProduct($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM `products` WHERE `products`.`id` =".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function updateProduct($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "UPDATE products set  
                            title='"            . $input->title ."', 
                            slug='"             . $input->slug ."', 
                            s_desc='"           . $input->s_desc ."', 
                            desc='"             . $input->desc ."', 
                            quantity='"         . $input->quantity ."', 
                            regular_price='"    . $input->regular_price ."', 
                            offer_price='"      . $input->offer_price ."', 
                            sku_code='"         . $input->sku_code ."', 
                            product_type='"     . $input->product_type ."', 
                            tags='"             . $input->tags ."', 
                            featured_item='"    . $input->featured_item ."', 
                            status='"           . $input->status ."', 
                            cat_id='"           . $input->cat_id ."', 
                            image='"            . $input->image ."'
                            WHERE id="          . $input->id;

            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    if(isset($_POST['filter'])){
        echo filterProduct($_POST['filter']);
    }
    else if(isset($_POST['product'])){
        $product = json_decode($_POST['product']);
        $result = createProduct($product);
        if($result){
            echo json_encode(array(
                "content" => "Product Added..."  . $result,
                "success" => true
            ));
        }
        else{
            echo json_encode(array(
                "content" => $result,
                "success" => false
            ));
        }
    }
    else if(isset($_POST['delete_id'])){
        $result = deleteProduct($_POST['delete_id']);
        if($result){
            echo json_encode(array(
                "content" => "Product Deleted...",
                "success" => true
            ));
        }
        else{
            echo json_encode(array(
                "content" => $result,
                "success" => false
            ));
        }
    }
    else if(isset($_POST['upProduct'])){
        $product = json_decode($_POST['product']);
        $result = updateProduct($product);
        if($result){
            echo json_encode(array(
                "content" => "Product Updated...",
                "success" => true
            ));
        }
        else{
            echo json_encode(array(
                "content" => $result,
                "success" => false
            ));
        }
    }
    else if(isset($_POST['search'])){
        echo searchProduct($_POST['search']);
    }
?>