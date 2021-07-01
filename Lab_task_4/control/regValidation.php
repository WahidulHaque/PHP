<?php 
    if(isset($_POST['submit'])){
        $name       =   $_POST["name"]; 
        $email      =   $_POST["email"]; 
        $day        =   $_POST["day"];
        $month      =   $_POST["month"];
        $year       =   $_POST["year"];
        $password   =   $_POST["password"];
        $retype     =   $_POST["retype"];
        $username   =   $_POST["username"];
        $gender="";

        if(empty($name) || empty($email) || empty($password) || empty($retype) || empty($day) || empty($month) || empty($year) || empty($_POST['gender']) || empty($username)){
            echo 100;
            echo "Please Insert All Informations... <br><a href='index.php'>Home</a>";
        }
        else{
            $validName      = validateName($name);
            $validEmail     = validateEmail($email);
            $validDate      = validateDob($day,$month,$year);
            $validPassword  = validatePassword($password);
            $validRetype    = validatePassword($retype);
            $validUserName  = validateUserName($username);

            $errorCode=NULL;

            if($validName == 1 && $validEmail == 1 && $validDate == 1 
                && isset($gender) && $validPassword == 1 && $validRetype == 1 && $password === $retype){
                
                $formdata = array(
                    'Name'      =>  $name,
                    'Email'     =>  $email,
                    'Password'  =>  $password,
                    'Username'  =>  $username,
                    'Gender'    =>  $_POST['gender'],
                    'DOB'       =>  $day . '\\' . $month .'\\' . $year,
                    "File_Path" =>  "",
                    "Role"      => 2
                );

                $tempData = json_decode(file_get_contents('../data/users.json'));
                $tempData[] = $formdata;
        
                $jsondata = json_encode($tempData, JSON_PRETTY_PRINT);
        
                if(file_put_contents("../data/users.json", $jsondata)) {
                    echo "<br>Registration Successful <br>";
                    echo "<a href='../layers/login.php'>Login</a>";
                }
                else{
                    echo "Can't Save Data...";
                }
                $sl = 1;
                foreach(json_decode(file_get_contents("../data/users.json")) as $item)
                {
                    echo "Result No: " . $sl ."<br>";
                    foreach($item as $key=>$value)
                    {
                        echo $key." : ".$value."<br>";
                    } 
                    echo "<br>";
                    $sl++;
                }
                echo "<br><a href='../layers/login.php'>Login</a>";
            }
            else{
                echo 900;
                echo "Please Insert All Informations... <br><a href='../layers/index.php'>Home</a>";
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