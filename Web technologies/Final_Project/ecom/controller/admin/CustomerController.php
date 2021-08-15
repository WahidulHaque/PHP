<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }
    
    // ALL FORM SUBMISSIONS
    if(isset($_POST['edit_customer']) && isset($_POST['c_id'])){
        $data = array(
            "id"            => $_POST['c_id'],
            "user_type"     => $_POST['user_type'],
            "status"        => $_POST['status']
        );

        $result = update($data);
        if($result){
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/customers.php?do=Manage');
        }
    }   
    else if(isset($_POST['dlt_id']) && isset($_POST['dlt_cp'])){
        $result = delete($_POST['dlt_id']);
        if($result){
            $_SESSION['message'] = "Method Deleted..";
            header('location: ../../views/admin/customers.php?do=Manage');
        }
    }
    
    function getAll(){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `customers`";
        $result     = mysqli_query($db, $sql_query);
        return $result;
    }

    function getCustomer($id){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `customers` WHERE id=".$id;
        $result     = mysqli_query($db, $sql_query);
        while($method = mysqli_fetch_object($result)){
            return $method;
        }
    }

    function create($input, $file){
        $db = dbConnection();
        if(!empty($input)){
            if(isset($file)){
                $ext_arr = explode('.',$file['name']);
                $ext = end( $ext_arr );
                $filename = time() . '.' . $ext;

                $sql_query = "INSERT INTO `customers` (`name`, `email`, `password`, `phone`, `address`, `city`, `country`, `zipcode`, `image`, `user_type`, `status`)
                            VALUES('". $input['name'] ."','". $input['email'] ."','". $input['password'] ."','". $input['phone'] ."',
                            '". $input['address'] ."','". $input['city'] ."','". $input['country'] ."','". 
                            $input['zipcode'] ."','". $filename ."','". $input['user_type'] ."','". $input['status'] ."')";
                $result     = mysqli_query($db, $sql_query);
                if($result){
                    move_uploaded_file($file['tmp_name'] , "../../assets/img/customers/" . $filename);
                    return $result;
                }
            }
            else{
                $sql_query = "INSERT INTO `customers` (`name`, `email`, `password`, `phone`, `address`, `city`, `country`, `zipcode`, `user_type`, `status`)
                            VALUES('". $input['name'] ."','". $input['email'] ."','". $input['password'] ."','". $input['phone'] ."',
                            '". $input['address'] ."','". $input['city'] ."','". $input['country'] ."','". 
                            $input['zipcode'] ."','". $input['user_type'] ."','". $input['status'] ."')";
                $result     = mysqli_query($db, $sql_query);
                return $result;
            }
        }
    }

    function delete($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM `customers` where id=".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function update($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "UPDATE `customers` set `user_type`='". $input['user_type'] ."', `status`='". $input['status'] ."'
                        WHERE id=".$input['id'];
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function writeTable($data){
        $markUp = "";
        if(isset($data)){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $status = ($item->status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                $user_type  = ($item->user_type == 0) ? '<span class="badge badge-success">Premium</span>' : 
                                (($item->user_type == 1) ? '<span class="badge badge-warning">Gold</span>' : '<span class="badge badge-info">Normal</span>');
                $img_path       = (!empty($item->image)) ? "assets/img/customers/".$item->image : "";

                $markUp .= '<tr>
                                <td>'.  $sl++ .'</td>
                                <td>
                                    <img src="'. $img_path . '" alt="">
                                </td>
                                <td>'. $item->name      .'</td>
                                <td>'. $item->email     .'</td>
                                <td>'. $item->phone     .'</td>
                                <td>'. $user_type       .'</td>
                                <td>'. $status          .'</td>
                                <td>
                                    <a href="customers.php?do=View&view_id='. $item->id .'" class="btn btn-outline-secondary" ><i class="far fa-eye"></i></a>
                                    <a href="customers.php?do=Edit&edit_id='. $item->id .'" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>

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
                                                    Do you want to delete Product : '.$item->name.' permanently?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="../../controller/admin/CustomerController.php" method="post">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="dlt_id" value="'.$item->id.'">
                                                        <button type="submit" name="dlt_cp" class="btn btn-primary">Confirm Delete</button>
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


?>