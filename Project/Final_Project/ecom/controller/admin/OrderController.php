<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }
    if(!include_once("CustomerController.php")){
        include "CustomerController.php";
    }
    if(!include_once("PaymentController.php")){
        include "PaymentController.php";
    }

    // ALL FORM SUBMISSIONS
    if(isset($_POST['edit_order']) && isset($_POST['o_id'])){
        $data = array(
            "id"            => $_POST['o_id'],
            "user_type"     => $_POST['user_type'],
            "status"        => $_POST['status']
        );

        $result = updateOrder($data);
        if($result){
            $_SESSION['message'] = "Method Added...";
            header('location: ../../views/admin/orders.php?do=Manage');
        }
    }
    
    function getAllOrders(){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `orders`";
        $result     = mysqli_query($db, $sql_query);
        return $result;
    }

    function getOrder($id){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `orders` WHERE id=".$id;
        $result     = mysqli_query($db, $sql_query);
        while($method = mysqli_fetch_object($result)){
            return $method;
        }
    }

    function findOrders($id){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `orders` WHERE user_id=".$id;
        $result     = mysqli_query($db, $sql_query);
        return $result;
    }

    function updateOrder($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "UPDATE `orders` set `status`='". $input['status'] ."', `priceWithCoupon`='". $input['priceWithCoupon'] ."'
                        WHERE id=".$input['id'];
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function writeTableOrder($data){
        $markUp = "";
        if(isset($data)){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $status = ($item->status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                $is_paid  = ($item->is_paid == 0) ? '<span class="badge badge-warning">Pending</span>' : '<span class="badge badge-info">Paid</span>';

                $markUp .= '<tr>
                                <td>'.  $sl++ .'</td>
                                <td>'. getCustomer($item->user_id)->name            .'</td>
                                <td>'. $item->first_name . ' ' . $item->last_name   .'</td>
                                <td>'. $item->email                                 .'</td>
                                <td>'. $item->phone                                 .'</td>
                                <td> BDT.'. $item->product_finalPrice               .'</td>
                                <td> BDT.'. $item->priceWithCoupon                  .'</td>
                                <td>'. $is_paid                                     .'</td>
                                <td>'. getMethod($item->payment_id)->name           .'</td>
                                <td>'. date('d-M-Y', strtotime($item->created_at))  .'</td>
                                <td>'. $status                                      .'</td>
                                <td>
                                    <a href="orders.php?do=Edit&edit_id='. $item->id .'" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>
                                </td>
                            </tr>';
            }
        }
        return $markUp;
    }


?>