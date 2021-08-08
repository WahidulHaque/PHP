<?php
    session_start();
    require "../config/db.php";

    if(isset($_POST['submit'])){

        $curPass        =   $_POST['current'];
        $newPass        =   $_POST['new'];
        $retypePass     =   $_POST['retype'];
        $errors         =   [];

        $sql = "select * from users where id=".$_SESSION['user']->id;
        $result = mysqli_query($db, $sql);
        echo mysqli_num_rows($result);
        if( mysqli_num_rows($result) > 0 ){
            while($item = mysqli_fetch_object($result))
            {
                if(isset($_SESSION['user']) && $item->username == $_SESSION['user']->username ){
                    if($newPass == $retypePass){
                        $tempUser = $item;
                        $sql = "UPDATE `users` SET `password` = '".$newPass."' WHERE `users`.`id` = ".$_SESSION['user']->id;
                        $updateResult = mysqli_query($db, $sql);
                        if($updateResult == 1){
                            $_SESSION['user']->password = $newPass;
                            if($_SESSION['user']->role == 0){
                                header('Location: ../layers/admin/profile.php');
                            }
                        }
                    }
                }
            }
        }
    }

    function validatePassword($pass){
        $emailCode = 0;
        $validEmailCode = 0;
        if(isset($pass)){
            $name_array = str_split($pass);
            foreach($name_array as $pass_char){
                if( strlen($pass) >= 8 && ( $pass_char == '@' || $pass_char == '#'  ||  $pass_char == '%' || $pass_char == '$') ){
                    $validEmailCode = 1;
                }
            }
        }
        return $validEmailCode;
    }

?>