<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }

    // ALL FORM SUBMISSIONS
    if(isset($_POST['editMethod']) && isset($_POST['m_id'])){
        $data = null;
        $result = null;
        if(isset($_POST['image'])){
            $data = array(
                "id"        => $_POST['m_id'],
                "name"      => $_POST['name'],
                "priority"  => $_POST['priority'],
                "type"      => $_POST['type'],
                "number"    => $_POST['number'],
                "image"     => $_FILES['image']['name']
            );
            $result = updateMethod($data, $_FILES['image']);
        }
        else{
            $data = array(
                "id"        => $_POST['m_id'],
                "name"      => $_POST['name'],
                "priority"  => $_POST['priority'],
                "type"      => $_POST['type'],
                "number"    => $_POST['number']
            );
            $result = updateMethod($data, null);
        }
        if($result){
            $_SESSION['message'] = "Method Updated...";
            header('location: ../../views/admin/payments.php?do=Manage');
        }
    }   
    else if(isset($_POST['dlt_id']) && isset($_POST['dlt_method'])){
        $result = deleteMethod($_POST['dlt_id']);
        if($result){
            $_SESSION['message'] = "Method Deleted..";
            header('location: ../../views/admin/payments.php?do=Manage');
        }
    }
    else if(isset($_POST['add_method'])){
        $data = null;
        $result = null;
        if(isset($_POST['image'])){
            $data = array(
                "name"      => $_POST['name'],
                "priority"  => $_POST['priority'],
                "type"      => $_POST['type'],
                "number"    => $_POST['number'],
                "image"     => $_FILES['image']['name']
            );
            $result = createMethod($data, $_FILES['image']);
        }
        else{
            $data = array(
                "name"      => $_POST['name'],
                "priority"  => $_POST['priority'],
                "type"      => $_POST['type'],
                "number"    => $_POST['number']
            );
            $result = createMethod($data, null);
        }
        if($result){
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/payments.php?do=Manage');
        }
    }

    function getAllMethods(){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `payments`";
        $result     = mysqli_query($db, $sql_query);
        
        return $result;
    }

    function getMethod($id){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `payments` WHERE id='".$id."';";
        $result     = mysqli_query($db, $sql_query);
        while($method = mysqli_fetch_object($result)){
            return $method;
        }
    }

    function createMethod($input){
        $db = dbConnection();
        if(!empty($input)){
            if(isset($file)){
                $sql_query = "INSERT INTO `payments` (`name`, `image`, `priority`, `slug`, `number`, `type`) 
                                VALUES ('". $input['name'] ."','". $input['image'] ."','". $input['priority'] ."', 
                                        '". strtolower($input['name']) ."', '". $input['number'] ."','". $input['type'] ."')";
                $result     = mysqli_query($db, $sql_query);
                if($result){
                    $ext = end( explode('.',$file['name']) );
                    $filename = time() . $ext;
                    move_uploaded_file($file['tmp_name'] , "../../assets/admin/img/products/" . $filename);
                    return $result;
                }
            }
            else{
                $sql_query = "INSERT INTO `payments` (`name`, `priority`, `slug`, `number`, `type`) 
                                VALUES ('". $input['name'] ."', '". $input['priority'] ."', 
                                        '". strtolower($input['name']) ."', '". $input['number'] ."','". $input['type'] ."')";
                $result     = mysqli_query($db, $sql_query);
                return $result;
            }
        }
    }

    function deleteMethod($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM `payments` where id=".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function updateMethod($input, $file){
        $db = dbConnection();
        if(!empty($input)){
            if(isset($file)){
                $sql_query = "UPDATE `payments` set name='". $input['name'] ."', slug='". strtolower($input['name']) ."', 
                            priority='". $input['priority'] ."', type='". $input['type'] ."', number='". $input['number'] ."',
                            image='". $input['image'] ."' WHERE id=".  $input['id'];
                $result     = mysqli_query($db, $sql_query);
                if($result){
                    $ext = end( explode('.',$file['name']) );
                    $filename = time() . $ext;
                    move_uploaded_file($file['tmp_name'] , "../../assets/admin/img/products/" . $filename);
                    return $result;
                }
            }
            else{
                $sql_query = "UPDATE `payments` set name='". $input['name'] ."', slug='". strtolower($input['name']) ."', 
                            priority='". $input['priority'] ."', type='". $input['type'] ."', number='". $input['number'] ."'
                            WHERE id=". $input['id'];
                $result     = mysqli_query($db, $sql_query);
                return $result;
            }
        }
    }

    function writeTableMethod($data){
        $markUp = "";
        if(isset($data)){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $img_path       = (!empty($item->image)) ? "assets/img/products/".$item->image : "";
                $type           = ($item->type == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                $priority       = ($item->priority == 1) ? '<span class="badge badge-success">High</span>' : '<span class="badge badge-danger">Low</span>';
                $markUp .= '<tr>
                                <td>'.  $sl++ .'</td>
                                <td>
                                    <img src="'. $img_path . '" alt="">
                                </td>
                                <td>'. $item->name .'</td>
                                <td>'. $item->number .'</td>
                                <td>'. $priority .'</td>
                                <td>'. $type .'</td>
                                <td>
                                    <a href="payments.php?do=Edit&edit_id='. $item->id .'" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>
                                    
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
                                                    <form action="../../controller/admin/PaymentController.php" method="post">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="dlt_id" value="'.$item->id.'">
                                                        <button type="submit" class="btn btn-primary" name="dlt_method">Confirm Delete</button>
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