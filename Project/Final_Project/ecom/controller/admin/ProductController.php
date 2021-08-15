<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";   //include the database configuration file to connect with database
    }

    require "CategoryController.php";
    
    // session_start();                        //start session to store variable data in session

    function getAllProducts(){
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
            $markUpData = writeProductTable(getAllProducts());
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
                $img_path       = (!empty($item->image)) ? "../../assets/img/products/".$item->image : "";

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
                                <td>'.  $sl_product++ .'</td>
                                <td>
                                    <img src="'. $img_path . '" alt="">
                                </td>
                                <td>'. $item->title .'</td>
                                <td>'. $cat_name .'</td>
                                <td>'. substr($item->s_desc, 0, 50) .'</td>
                                <td>BDT.'. $item->regular_price .'</td>
                                <td>BDT.'. $item->offer_price .'</td>
                                <td>'. $featured_item .'</td>
                                <td>'. $item->quantity .' Pcs</td>
                                <td>'. $status .'</td>
                                <td>
                                    <a href="product.php?do=Edit&edit_id='. $item->id .'" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>
                                    
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#pr_'.$item->id.'">
                                        <i class="far fa-trash-alt"></i>
                                    </button>

                                    <div class="modal fade" id="pr_'.$item->id.'" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold text-warning" id="exampleModalLongTitle">Warning</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete Product : '.$item->title.' permanently?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post" id="df_'.$item->id.'">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" id="pid_'.$item->id.'" value="'.$item->id.'">
                                                        <button type="button" class="btn btn-primary dlt" onclick="deleteProductAction(event)" id="btnConfirmDelete_'.$item->id.'">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            '". $input->product_type ."','". $input->tags ."','". $input->featured_item ."','". $input->status ."',
                            '". $input->cat_id ."','". $input->image ."');";
            
            $result     = mysqli_query($db, $sql_query);

            if($result){
                return $result;
            }
            else{
                return mysqli_error($db);
            }
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
            $sql_query = "UPDATE products set";
            if(isset($input->image)){
                $sql_query .= "title='"            . $input->title ."', 
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
                            image='"            . $input->image['name'] ."'
                            WHERE id="          . $input->id;
            }
            else{
                $sql_query .= "title='"            . $input->title ."', 
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
                            cat_id='"           . $input->cat_id ."'
                            WHERE id="          . $input->id;
            }
            $result     = mysqli_query($db, $sql_query);
            if($result && isset($input->image)){
                $ext = end( explode('.',$input->image['name']) );
                $filename = time() . $ext;
                move_uploaded_file($input->image['tmp_name'], "../../assets/admin/img/products/" . $filename);
                return $result;
            }
            else if($result){
                return $result;
            }
            else{
                return mysqli_error($db);
            }
            
        }
    }

    if(isset($_POST['data']) && $_POST['data'] == "all"){
        $productList = writeProductTable( getAllProducts() );
        $return_arr  = array(
            "content" => $productList,
            "filterList" => writeCategorySelect(),
            "success" => true
        );
        echo json_encode($return_arr);
    }
    else if(isset($_POST['filter'])){
        $data = filterProduct($_POST['filter']);
        echo $data;
    }
    else if(isset($_POST['addProduct'])){
        if(isset($_POST['title']) && isset($_POST['cat_id']) && isset($_POST['regular_price']) &&  isset($_POST['offer_price']) && 
            isset($_POST['sku_code']) && isset($_POST['featured_item']) && isset($_POST['status']) && isset($_POST['tags']) && 
            isset($_FILES['productImg']) && isset($_POST['quantity']) && isset($_POST['s_desc']) && isset($_POST['description'])){
                $epd = explode('.', $_FILES['productImg']['name']);
                $ext = end( $epd );
                $filename = time() . $ext;

                $product = (object) array(
                    "title" => $_POST['title'],
                    "cat_id" => $_POST['cat_id'],
                    "regular_price" => $_POST['regular_price'],
                    "offer_price" => $_POST['offer_price'],
                    "sku_code" => $_POST['sku_code'],
                    "featured_item" => $_POST['featured_item'],
                    "status" => $_POST['status'],
                    "tags" => $_POST['tags'],
                    "image" => $filename,
                    "quantity" => $_POST['quantity'],
                    "s_desc" => $_POST['s_desc'],
                    "desc" => $_POST['description'],
                    "slug" => str_replace(' ', '-', strtolower($_POST['title'])),
                    "product_type" => 1
                );
                $result = createProduct($product);
                if($result){
                    $epd = explode('.', $_FILES['productImg']['name']);
                    $ext = end( $epd );
                    $filename = time() . $ext;
                    move_uploaded_file($_FILES['productImg']['tmp_name'], "../../assets/img/products/" . $filename);
                    echo json_encode(array(
                        "content" => "Product Added...",
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
        else{
            header('location: ../../views/admin/product.php?do=Manage');
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
        $product = json_decode($_POST['upProduct']);
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