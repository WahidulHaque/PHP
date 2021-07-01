<?php
    session_start();
    if(isset($_POST['submit'])){
        $email    = $_POST['email'];
        
        if(empty($email)){
            echo "Please Insert All Informations... <br><a href='index.php'>Home</a>";
        }
        else{
            $validEmail          = validateEmail($email);
 
            if($validEmail == 1){
                foreach(json_decode(file_get_contents("../data/users.json")) as $item)
                {
                    foreach($item as $key=>$value)
                    {
                        if($key == "Email" && $value == $email){
                            $_SESSION['user'] = $item;
                            header('Location: ../layers/forgotPass.php');
                        }
                    } 
                }
            }
            else{
                echo "Please Insert All Informations... <br><a href='./layers/login.php'>Login</a>";
            }
        }
    }
 
    if(isset($_POST['passSubmit']) && isset($_SESSION['user']) || isset($_POST['email'])){
        $user = null;
        $curPass        =   $_POST['current'];
        $newPass        =   $_POST['new'];
        $retypePass     =   $_POST['retype'];
 
        if(isset($_POST['email'])){
            $jsonArray = json_decode(file_get_contents("../data/users.json"));
            foreach( $jsonArray as $item)
            {
                if($_SESSION['user']->Email == $_POST['email']){
                    
                    $user = $item;
                    
                    $tmpuser = $item;
                            
                    $tmpuser->Password = $newPass;
                    
                    if (($s = array_search($item, $jsonArray)) !== false) {
                        unset($jsonArray[$s]);
                        $jsonArray = array_values($jsonArray);
                    }
 
                    $jsonArray[] = $tmpuser;
 
                    $jsonArray_final = json_encode($jsonArray, JSON_PRETTY_PRINT);
                    
                    file_put_contents("../data/users.json", $jsonArray_final);
 
                    header('Location: ../layers/login.php');
                }
            }
        }
        else if(isset($_SESSION['user'])){
            if($newPass == $retypePass && $curPass == $_SESSION['user']->Password || $curPass == $user->Password && validatePassword($newPass) == 1 ){
            
                $jsonArray = json_decode(file_get_contents("../data/users.json"));
    
                foreach( $jsonArray as $item)
                {
                    if($_SESSION['user']->Username == $item->Username || $user->Username == $item->Username){
                        
                        $tmpuser = $item;
                        
                        $tmpuser->Password = $newPass;
                        
                        if (($s = array_search($item, $jsonArray)) !== false) {
                            unset($jsonArray[$s]);
                            $jsonArray = array_values($jsonArray);
                        }
    
                        $jsonArray[] = $tmpuser;
    
                        if(!empty($_SESSION['user'])){
                            $_SESSION['user'] = $tmpuser;
                        }
    
                        $jsonArray_final = json_encode($jsonArray, JSON_PRETTY_PRINT);
                        
                        file_put_contents("../data/users.json", $jsonArray_final);
    
                        header('Location: ../layers/login.php');
                    }
                }
            }else{
                print_r($errors);
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

