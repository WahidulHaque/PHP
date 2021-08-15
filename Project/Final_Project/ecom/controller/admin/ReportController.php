<?php
    
    include "UserController.php";
    include "CustomerController.php";
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }
    function getStockReport(){
        $db = dbConnection();
        $sql = "SELECT * FROM `products` ORDER BY quantity ASC";
        $result = mysqli_query($db, $sql);
        return writeReport($result, 1);
    }

    function getLogReport(){
        $db = dbConnection();
        $sql = "SELECT * FROM `log_detail` ORDER BY login_time DESC";
        $result = mysqli_query($db, $sql);
        return writeReport($result, 2);
    }

    function getTopCustomerReport(){
        $db = dbConnection();
        $sql = "SELECT * FROM `customers` ORDER BY order_count DESC";
        $result = mysqli_query($db, $sql);
        return writeReport($result, 3);
    }

    function writeReport($data, $type){
        $markUp = "";
        if($type == 1){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $markUp .= '<tr>
                                <td>'. $sl++                    .'</td>
                                <td>'. $item->title             .'</td>
                                <td>'. $item->quantity          .'</td>
                                <td>BDT.'. $item->regular_price     .'</td>
                            </tr>';
            }
            return $markUp;
        }
        else if($type == 2){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $logout = (isset($item->logout_time)) ? date('d-M-Y H:i A', strtotime($item->logout_time)) : "-";
                $markUp .= '<tr>
                                <td>'. $sl++                             .'</td>
                                <td>'. getMethod($item->user_id)->name .'</td>
                                <td>'.date('d-M-Y H:i A', strtotime($item->login_time)) .'</td>
                                <td>'. $logout .'</td>
                            </tr>';
            }
            return $markUp;
        }
        else if($type == 3){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $user_type  = ($item->user_type == 0) ? '<span class="badge badge-success">Premium</span>' : 
                            (($item->user_type == 1) ? '<span class="badge badge-warning">Gold</span>' : '<span class="badge badge-info">Normal</span>');
                $markUp .= '<tr>
                                <td>'. $sl++                .'</td>
                                <td>'. $item->name          .'</td>
                                <td>'. $item->order_count   .'</td>
                                <td>'. $user_type           .'</td>
                            </tr>';
            }
            return $markUp;
        }
    }
?>