<?php 
    session_start();
    if(isset($_POST['submit'])){
        $name       =   $_POST["name"]; 
        $email      =   $_POST["email"]; 
        $day        =   $_POST["day"];
        $month      =   $_POST["month"];
        $year       =   $_POST["year"];
        $username   =   $_POST["username"];
        $gender="";

        if(empty($name) || empty($email) || empty($day) || empty($month) || empty($year) || empty($_POST['gender']) || empty($username)){
            echo 100;
            echo "Please Insert All Informations... <br><a href='../layers/admin/editProfile.php'>Go Back</a>";
        }
        else{
            $validName      = validateName($name);
            $validEmail     = validateEmail($email);
            $validDate      = validateDob($day,$month,$year);
            $validUserName  = validateUserName($username);

            $errorCode=NULL;
            
            if($validName == 1 && $validEmail == 1 && $validDate == 1  && isset($_POST['gender']) ){
                
                $jsonArray = json_decode(file_get_contents("../data/users.json"));

                foreach( $jsonArray as $item)
                {
                    var_dump($_SESSION['user']);
                    if(isset($_SESSION['user']) && $_SESSION['user']->Username == $item->Username){
                        echo 505 . "<br>";
                        $tmpuser = $item;
                        
                        if (($s = array_search($item, $jsonArray)) !== false) {
                            unset($jsonArray[$s]);
                            $jsonArray = array_values($jsonArray);
                        }

                        $formdata = array(
                            'Name'      =>  $name,
                            'Email'     =>  $email,
                            'Password'  =>  $tmpuser->Password,
                            'Username'  =>  $tmpuser->Username,
                            'Gender'    =>  $_POST['gender'],
                            'DOB'       =>  $day . '/' . $month .'/' . $year,
                            "File_Path" =>  $tmpuser->File_Path,
                            "Role"      =>  $tmpuser->Role,
                        );

                        $tmpuser->Name = $name;
                        $tmpuser->Email = $email;
                        $tmpuser->Gender = $_POST['gender'];
                        $tmpuser->DOB = $day . '/' . $month .'/' . $year;

                        var_dump($formdata);
                        $jsonArray[] = $formdata;

                        $_SESSION['user'] = $tmpuser;
                        
                        $jsonArray_final = json_encode($jsonArray, JSON_PRETTY_PRINT);
                        
                        file_put_contents("../data/users.json", $jsonArray_final);
                        if($_SESSION['user']->Role == 1){
                            header('Location: ../layers/admin/profile.php');
                        }
                    }
                    
                }
                
            }
            else{
                echo 900;
                echo "Please Insert All Informations... <br><a href='../layers/admin/editProfile.php'>Go Back</a>";
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
    
    
    function validateDob($dd, $mm, $yr){
        if( ($dd >= 1 && $dd <=31) && ($mm >= 1 && $mm <=12) && ($yr >= 1992 && $yr <=1998) ){
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