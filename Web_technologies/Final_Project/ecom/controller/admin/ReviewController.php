<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }
    if(!include_once("CustomerController.php")){
        include "CustomerController.php";
    }
    if(!include_once("ProductController.php")){
        include "ProductController.php"; 
    }

    // ALL FORM SUBMISSIONS
    if(isset($_POST['edit']) && isset($_POST['pid_'])){
        $data = array(
            "id"            => $_POST['pid_'],
            "status"        => $_POST['status']
        );
        // var_dump($data);
        $result = updateReview($data);
        if($result){
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/reviews.php?do=Manage');
        }
    }   
    else if(isset($_POST['rid_']) && isset($_POST['dlt_cp'])){
        $result = deleteReview($_POST['rid_']);
        if($result){
            $_SESSION['message'] = "Method Deleted..";
            header('location: ../../views/admin/reviews.php?do=Manage');
        }
    }
    
    function getAllReviews(){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `reviews`";
        $result     = mysqli_query($db, $sql_query);
        return $result;
    }

    function updateReview($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "UPDATE `reviews` set `status`='". $input['status'] ."' WHERE id=".$input['id'];
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function deleteReview($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM `reviews` WHERE id=".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function writeTableReview($data){
        $markUp = "";
        if(isset($data)){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $status = ($item->status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                
                $markUp .= '<tr>
                                <td>'.  $sl++ .'</td>
                                <td>'. getCustomer($item->user_id)->name             .'</td>
                                <td>'. getProductById($item->product_id)->title      .'</td>
                                <td>'. $item->review                                 .'</td>
                                <td>'. $status         .'</td>
                                <td>
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#pre_'.$item->id.'">
                                        <i class="far fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#prd_'.$item->id.'">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="prd_'.$item->id.'" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold text-warning" id="exampleModalLongTitle">Warning</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete this Review permanently?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="../../controller/admin/ReviewController.php" method="post">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="rid_" value="'.$item->id.'">
                                                        <button type="submit" name="dlt_cp" class="btn btn-primary">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="pre_'.$item->id.'" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold text-warning" id="exampleModalLongTitle">Update Review</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../../controller/admin/ReviewController.php" method="post">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <select class="form-control" aria-placeholder="status" name="status">
                                                                    <option value="X" selected>Choose Status...</option>
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="pid_" value="'.$item->id.'">
                                                        <button type="submit" name="edit" class="btn btn-primary">Confirm Save</button>
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