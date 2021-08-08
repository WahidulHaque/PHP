<?php 
    session_start();
    require "../config/db.php";

    if(isset($_POST['submit'])){
        
        $name       =   $_POST["name"]; 
        $email      =   $_POST["email"]; 
        $day        =   $_POST["dob"];
        $username   =   $_POST["username"];
        $gender="";

        if(!isset($name) || !isset($email) || !isset($day) || !isset($_POST['gender']) || !isset($username)){
            echo (!empty($_SESSION['errorText'])) ? $_SESSION['errorText'] : "";
            echo "Please Insert All Informations... <br><a href='../layers/admin/editProfile.php'>Go Back</a>";
        }
        else{
            $validName      = validateName($name);
            $validEmail     = validateEmail($email);
            $validDate      = validateDob($day);
            $validUserName  = validateUserName($username);
            $errorCode=NULL;

            $sql = "select * from users where id=".$_SESSION['user']->id;
            $result = mysqli_query($db, $sql);

            if( mysqli_num_rows($result) > 0 ){
                while($item = mysqli_fetch_object($result))
                {
                    if(isset($_SESSION['user']) && $item->username == $_SESSION['user']->username ){
                        
                        $sql = "UPDATE `users` SET 
                                `name`='".$name."',
                                `gender`='".$_POST['gender']."',
                                `username`='".$username."',
                                `email`='".$email."',
                                `dob`='".$day."'
                                where 'id'=".$_SESSION['user']->id;

                        $updateResult = mysqli_query($db, $sql);
                        if($updateResult){
                            $_SESSION['user']->name = $name;
                            $_SESSION['user']->gender = $_POST['gender'];
                            $_SESSION['user']->username = $username;
                            $_SESSION['user']->email = $email;
                            $_SESSION['user']->dob = $dob;

                            if($_SESSION['user']->role == 0){
                                header('Location: ../layers/admin/profile.php');
                            }
                        }
                        else{
                            echo 505;
                        }
                    }
                    else{
                        echo 404;
                    }
                }
            }
            else{
                echo 303;
            }
        }
    }

    function validateName($name){
        $valid = 0;
        if(isset($name) && str_word_count($name) >= 2){
            $name_array = str_split($name);
            foreach($name_array as $name_char){
                if($name_char >= 'a' || $name_char <= 'z' || $name_char >= 'A' || $name_char <= 'Z' || $name_char == '-' || $name_char == '.'){
                    $valid++;
                }
            }
            if($valid == strlen($name)){
                if($name_array[0] >= 'a' || $name_array[0] <= 'z' || $name_array[0] >= 'A' || $name_array[0] <= 'Z'){
                    $valid = 1;
                }
            }   
        }
        else{
            $_SESSION['errorText'] = "Name Must be 2 Characters...";
        }
        return $valid;
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
    
    
    function validateDob($dd){
        if( !empty($dd)){
            return 1;
        }
        return 0;
    }

    function validateUserName($name){
        $valid = 0;
        if(isset($name) && strlen($name) >= 2){
            $name_array = str_split($name);
            foreach($name_array as $name_char){
                if($name_char >= 'a' || $name_char <= 'z' || $name_char >= 'A' || $name_char <= 'Z' || $name_char >= 0 || $name_char <= 9 || $name_char == '-' || $name_char == '.'){
                    $valid++;
                }
            }
            
            if($valid == strlen($name)){
                $valid = 1;
            }   
        }
        else{
            $_SESSION['errorText'] = "Name Must be 2 Characters...";
        }
        return $valid;
    }
    
    // Email Validation
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