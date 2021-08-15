<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // ALL FORM SUBMISSIONS
    if(isset($_POST['edit_user']) && isset($_POST['u_id'])){
        $data = array(
            "id"        => $_POST['u_id'],
            "name"      => $_POST['name'],
            "email"     => $_POST['email'],
            "phone"     => $_POST['phone'],
            "address"   => $_POST['address'],
            "user_type" => $_POST['user_type'],
            "status"    => $_POST['status']
        );
        $result = null;
        if(isset($_FILES['image'])){
            $file = array(
                "name"      => $_FILES['image']['name'],
                "tmp_name"  => $_FILES['image']['tmp_name'],
                "type"      => $_FILES['image']['type'],
                "size"      => $_FILES['image']['size'],
            );
            $result = updateUser($data, $file);
        }
        else{
            $result = updateUser($data, null);
        }
        if($result && isset($_SESSION['user'])){
            $_SESSION['user'] = getMethod($data['id']);
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/profile.php?do=Manage');
        }
        else if($result){
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/users.php?do=Manage');
        }
        // header('location: ../../views/admin/users.php?do=Manage');
    }   
    else if(isset($_POST['dlt_id']) && isset($_POST['dlt_user'])){
        $result = deleteUser($_POST['dlt_id']);
        if($result){
            $_SESSION['message'] = "Method Deleted..";
            header('location: ../../views/admin/users.php?do=Manage');
        }
    }
    else if(isset($_POST['add_user'])){
        $data = array(
            "name"      => $_POST['name'],
            "email"     => $_POST['email'],
            "password"  => generateRandomString(),
            "phone"     => $_POST['phone'],
            "address"   => $_POST['address'],
            "user_type" => $_POST['user_type'],
            "status"    => $_POST['status']
        );
        $result = null;

        if(isset($_FILES['image'])){
            $file = array(
                "name"      => $_FILES['image']['name'],
                "tmp_name"  => $_FILES['image']['tmp_name'],
                "type"      => $_FILES['image']['type'],
                "size"      => $_FILES['image']['size'],
            );
            $result = createUser($data, $file);
        }
        else{
            $result = createUser($data, null);
        }
        if($result){
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/users.php?do=Manage');
        }
        header('location: ../../views/admin/users.php?do=Manage');
    }

    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%^&*()_+';
        return substr( str_shuffle( str_repeat($characters , ceil($length/strlen($characters)) )) , 0 , $length);
    }
    
    function getAllUser(){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `users`";
        $result     = mysqli_query($db, $sql_query);
        
        return $result;
    }

    function getMethod($id){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `users` WHERE id='".$id."';";
        $result     = mysqli_query($db, $sql_query);
        while($method = mysqli_fetch_object($result)){
            return $method;
        }
    }

    function createUser($input, $file){
        $db = dbConnection();
        if(!empty($input)){
            if(isset($file)){
                $ext_arr = explode('.', $file['name']);
                $ext = end( $ext_arr );
                $filename = time() . '.' . $ext;

                $sql_query = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`, `image`, `user_type`, `status`) 
                                VALUES ('". $input['name'] ."', '". $input['email'] ."', '". $input['password'] ."', '". $input['phone'] ."',
                                '". $input['address'] ."', '". $filename ."', '". $input['user_type'] ."','". $input['status'] ."');";
                $result     = mysqli_query($db, $sql_query);
                if($result){
                    move_uploaded_file($file['tmp_name'] , "../../assets/img/users/" . $filename);
                    return $result;
                }
            }
            else{
                $sql_query = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`, `user_type`, `status`) 
                                VALUES ('". $input['name'] ."', '". $input['email'] ."', '". $input['password'] ."', '". $input['phone'] ."',
                                '". $input['address'] ."', '". $input['user_type'] ."','". $input['status'] ."');";
                $result     = mysqli_query($db, $sql_query);
                return $result;
            }
        }
    }

    function deleteUser($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM `users` where id=".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function updateUser($input, $file){
        $db = dbConnection();
        if(!empty($input)){
            if(isset($file)){
                $ext_arr = explode('.',$file['name']);
                $ext = end( $ext_arr );
                $filename = time() . '.' . $ext;

                $sql_query = "UPDATE `users` set name='". $input['name'] ."', email='". $input['email'] ."', 
                            status='". $input['status'] ."', phone='". $input['phone'] ."',
                            address='". $input['address'] ."', user_type='". $input['user_type'] ."',image='". $filename ."'
                            WHERE id=". $input['id'];
                $result     = mysqli_query($db, $sql_query);
                if($result){
                    $ext = end( explode('.',$file['name']) );
                    $filename = time() . $ext;
                    move_uploaded_file($file['tmp_name'] , "../../assets/img/users/" . $filename);
                    return $result;
                }
            }
            else{
                $sql_query = "UPDATE `users` set name='". $input['name'] ."', email='". $input['email'] ."', 
                            status='". $input['status'] ."', phone='". $input['phone'] ."',
                            address='". $input['address'] ."', user_type='". $input['user_type'] ."'
                            WHERE id=". $input['id'];
                $result     = mysqli_query($db, $sql_query);
                return $result;
            }
        }
    }

    function writeTableUser($data){
        $markUp = "";
        if(isset($data)){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $img_path       = (!empty($item->image)) ? "../../assets/img/users/".$item->image : "https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png";
                $type           = ($item->status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                $user_type      = ($item->user_type == "ADM") ? '<span class="badge badge-success">Admin</span>' : 
                                    (($item->user_type == "MGR") ? '<span class="badge badge-info">Manager</span>' : '<span class="badge badge-warning">Salesman</span>');
                $markUp .= '<tr class="align-items-center">
                                <td>'.  $sl++ .'</td>
                                <td>
                                    <img src="'. $img_path . '" class="table-img" alt="">
                                </td>
                                <td>'. $item->name      .'</td>
                                <td>'. $item->email     .'</td>
                                <td>'. $item->phone     .'</td>
                                <td>'. $item->address   .'</td>
                                <td>'. $user_type       .'</td>
                                <td>'. $type            .'</td>
                                <td>
                                    <a href="users.php?do=Edit&edit_id='. $item->id .'" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>
                                    
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
                                                    <form action="../../controller/admin/UserController.php" method="post">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="dlt_id" value="'.$item->id.'">
                                                        <button type="submit" class="btn btn-primary" name="dlt_user">Confirm Delete</button>
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