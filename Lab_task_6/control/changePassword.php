<?php
    session_start();
    require "../config/db.php";

    if(isset($_POST['submit'])){
        $email    = $_POST['email'];
        
        if(empty($email)){
            echo "Please Insert All Informations... <br><a href='index.php'>Home</a>";
        }
        else{
            $validEmail          = validateEmail($email);

            if($validEmail == 1){
                $sql = "select * from users where email='".$email."';";
                $result = mysqli_query($db, $sql);
                while($item = mysqli_fetch_object($result))
                {
                    if($item->email == $email){
                        $_SESSION['user_reset'] = $item;
                        header('Location: ../layers/forgotPass.php');
                    }
                }
            }
            else{
                echo "Please Insert All Informations... <br><a href='./layers/login.php'>Login</a>";
            }
        }
    }

    if(isset($_POST['passSubmit']) && isset($_SESSION['user_reset'])){
        $curPass        =   $_POST['current'];
        $newPass        =   $_POST['new'];
        $retypePass     =   $_POST['retype'];
        
        if(isset($_SESSION['user_reset']) && $_SESSION['user_reset']->password == $curPass){
            if($newPass == $retypePass && validatePassword($newPass) == 1 ){
                $sql = "UPDATE `users` SET 
                        `password`='".$newPass."'
                        where 'id'=".$_SESSION['user_reset']->id;
                $updateResult = mysqli_query($db, $sql);
                if($updateResult){
                    header('Location: ../layers/login.php');
                }
            }
        }
    }

    function validatePassword($pass){
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

    // Email Validation
    function validateEmail($email){
        $emailCode = 0;
        $validEmailCode = 0;
        if(isset($email)){
            $email_array = str_split($email);
            foreach($email_array as $email_char){
                if($email_char >= 'a' || $email_char <= 'z' || $email_char == '@' || $email_char == '.'){
                    $emailCode++;
                }
            }
            if($emailCode == strlen($email)){
                $validEmailCode = 1;
            }
        }
        return $validEmailCode;
    }
?>

