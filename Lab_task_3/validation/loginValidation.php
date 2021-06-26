<?php
    session_start();
    if(isset($_POST['submit'])){
        $username    = $_POST['username'];
        $password    = $_POST['password'];
        $remember;

        if(isset($_POST['remember'])){
            $remember = $_POST['remember'];
            setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("password", $password, time() + (86400 * 30), "/"); // 86400 = 1 day
        }

        if(empty($username) || empty($password)){
            echo "Please Insert All Informations... <br><a href='index.php'>Home</a>";
        }
        else{
            $validName          = validateName($username);
            $validPassword      = validatePassword($password);

            if($validName == 1 && $validPassword == 1 || isset($remember)){
                $valuser = 0;
                foreach(json_decode(file_get_contents("data.json")) as $item)
                {
                    foreach($item as $key=>$value)
                    {
                        if($key == "Username" && $value == $username){
                            $valuser = 1;
                        }
                        if($key == "Password" && $value == $password && $valuser == 1 ){
                            $_SESSION['user'] = $item;
                            header('Location: ../profile.php');
                        }
                    } 
                }
                var_dump(json_decode(file_get_contents("data.json")));
                // header('Location: ../login.php');
            }
            else{
                echo "Please Insert All Informations... <br><a href='./login.php'>Home</a>";
            }
        }
    }

    function validateName($name){
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