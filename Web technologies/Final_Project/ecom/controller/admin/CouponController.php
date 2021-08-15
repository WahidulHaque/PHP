<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }
    
    // ALL FORM SUBMISSIONS
    if(isset($_POST['edit_coupon']) && isset($_POST['c_id'])){
        $data = array(
            "id"            => $_POST['c_id'],
            "code"          => $_POST['code'],
            "discount"      => $_POST['discount'],
            "startDate"     => $_POST['startDate'],
            "endDate"       => $_POST['endDate'],
            "purchase_type" => $_POST['purchase_type'],
            "status"        => $_POST['status']
        );

        $result = update($data);
        echo $result;
        if($result){
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/coupons.php?do=Manage');
        }
    }   
    else if(isset($_POST['dlt_id']) && isset($_POST['dlt_cp'])){
        $result = delete($_POST['dlt_id']);
        if($result){
            $_SESSION['message'] = "Method Deleted..";
            header('location: ../../views/admin/coupons.php?do=Manage');
        }
    }
    else if(isset($_POST['add_coupon'])){
        $data = array(
            "code"          => $_POST['code'],
            "discount"      => $_POST['discount'],
            "startDate"     => $_POST['startDate'],
            "endDate"       => $_POST['endDate'],
            "purchase_type" => $_POST['purchase_type'],
            "status"        => $_POST['status']
        );
        $result = create($data);
        
        if($result){
            $_SESSION['message'] = "Coupon Added...";
            header('location: ../../views/admin/coupons.php?do=Manage');
        }
        // header('location: ../../views/admin/coupons.php?do=Manage');
    }
    
    function getAllCoupons(){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `coupons`";
        $result     = mysqli_query($db, $sql_query);
        return $result;
    }

    function getCoupon($id){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `coupons` WHERE id=".$id;
        $result     = mysqli_query($db, $sql_query);
        while($method = mysqli_fetch_object($result)){
            return $method;
        }
    }

    function create($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "INSERT INTO `coupons` (`code`, `discount`, `startDate`, `endDate`, `purchase_type`, `status`)
                            VALUES('". $input['code'] ."','". $input['discount'] ."','". $input['startDate'] ."','". $input['endDate'] ."',
                            '". $input['purchase_type'] ."','". $input['status'] ."')";

            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function delete($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM `coupons` where id=".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function update($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "UPDATE `coupons` set code='". $input['code'] ."', `discount`='". $input['discount'] ."', 
                        `startDate`='". $input['startDate'] ."', `endDate`='". $input['endDate'] ."', 
                        `purchase_type`='". $input['purchase_type'] ."', `status`='". $input['status'] ."'
                        WHERE id=". $input['id'];

            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function writeTable($data){
        $markUp = "";
        if(isset($data)){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $val = (strtotime(date('d-m-y'))  > strtotime($item->endDate)) ? true : false;
                $status = ($item->status == 1) ? '<span class="badge badge-success">Active</span>' : 
                        (($val == false) ? '<span class="badge badge-danger">Expired</span>' : '<span class="badge badge-secondary">Inactive</span>');
                $purchase_type  = ($item->purchase_type == 1) ? '<span class="badge badge-warning">One Time</span>' : '<span class="badge badge-info">Multiple Time</span>' ;
                $class = ($item->status == 1 && $val == false) ? "" : "disabled";
                $markUp .= '<tr>
                                <td>'.  $sl++ .'</td>
                                <td>'. $item->code .'</td>
                                <td>'. $item->discount .'</td>
                                <td>'. date('d-M-Y', strtotime($item->startDate)) .'</td>
                                <td>'. date('d-M-Y', strtotime($item->endDate)) .'</td>
                                <td>'. $purchase_type .'</td>
                                <td>'. $status .'</td>
                                <td>
                                    <a href="coupons.php?do=Edit&edit_id='. $item->id .'" class="btn btn-outline-info '. $class .'" ><i class="far fa-edit"></i></a>
                                    
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
                                                    Do you want to delete Product : '.$item->code.' permanently?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="../../controller/admin/CouponController.php" method="post">
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