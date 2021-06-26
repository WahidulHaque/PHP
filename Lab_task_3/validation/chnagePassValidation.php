<?php
    session_start();
    if(isset($_POST['submit'])){

        $curPass        =   $_POST['current'];
        $newPass        =   $_POST['new'];
        $retypePass     =   $_POST['retype'];

        if($newPass == $retypePass && $curPass == $_SESSION['user']->Password && validatePassword($newPass) == 1 ){
            
            $jsonArray = json_decode(file_get_contents("data.json"));

            foreach( $jsonArray as $item)
            {
                if(isset($_SESSION['user']) && $_SESSION['user']->Username == $item->Username){
                    
                    $tmpuser = $item;
                    
                    $tmpuser->Password = $newPass;
                    
                    if (($s = array_search($item, $jsonArray)) !== false) {
                        unset($jsonArray[$s]);
                        $jsonArray = array_values($jsonArray);
                    }

                    $jsonArray[] = $tmpuser;

                    $_SESSION['user'] = $tmpuser;
                    
                    $jsonArray_final = json_encode($jsonArray, JSON_PRETTY_PRINT);
                    
                    file_put_contents("data.json", $jsonArray_final);

                    header('Location: ../profile.php');
                    // echo "Success";
                }
            }
        }else{
            print_r($errors);
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