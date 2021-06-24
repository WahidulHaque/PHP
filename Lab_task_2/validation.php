<?php
    if(isset($_POST['submit'])){
        $name               = $_POST['name'];
        $email              = $_POST['email'];
        $day                = $_POST['day'];
        $month              = $_POST['month'];
        $year               = $_POST['year'];
        $gender             = $_POST['gender'];
        $degree             = $_POST['degree'];
        $bloodGroup         = $_POST['bloodGroup'];

        $errorPassCode = 0;

        if(empty($name) || empty($email) || empty($day) || empty($month) || empty($year) || empty($gender) || empty($degree) || empty($bloodGroup)){
            echo "Please Insert All Informations... <br><a href='index.php'>Home</a>";
        }
        else{
            $validName      = validateName($name);
            $validEmail     = validateEmail($email);
            $validDate      = validateDob($day,$month,$year);
            $validateDegree = validateDegree($degree);

            $errorCode=NULL;

            if($validName == 1 && $validEmail == 1 && $validDate == 1 && $validateDegree != "" && isset($gender) && isset($bloodGroup)){
                echo "Name  : " . $name . "<br>";
                echo "Email : " . $email . "<br>";
                echo "Date Of Birth : " . $day . "/" . $month . "/" . $year . "<br>";
                echo "Degree : " . $validateDegree . "<br>";
                echo "Gender : " . $gender . "<br>";
                echo "Blood Group : " . $bloodGroup . "<br>";
                echo "<br><a href='index.php'>Home</a>";
            }
            else{
                echo "Please Insert All Informations... <br><a href='index.php'>Home</a>";
            }
        }
    }

// Name Validation : 1.Value Set, 2. Word Count > 2, 3.Characters from a-z or A-Z or '-', 4.Starts with a letter 
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

function validateDegree($degree){
    $degText = "";
    if(isset($degree)){
        foreach($degree as $item){
            $degText .=  $item . " , "; 
        }
        return $degText;
    }
    return $degText;
}

?>