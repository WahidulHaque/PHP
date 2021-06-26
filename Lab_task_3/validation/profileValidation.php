<?php
    session_start();
    if(isset($_POST['submit'])){

        $file_name  =   $_FILES['profileImg']['name'];
        $file_size  =   $_FILES['profileImg']['size'];
        $file_tmp   =   $_FILES['profileImg']['tmp_name'];
        $file_type  =   $_FILES['profileImg']['type'];

        $errors = [];

        $arr        = explode('.', $_FILES['profileImg']['name']);
        
        $file_ext   =   strtolower( end( $arr ) );
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext, $extensions) === false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 4194304){
            $errors[]='File size must be excately 4 MB';
        }
        
        $filePath = "../images/".$file_name ;

        $accPath = "images/".$file_name ;
        
        if(empty($errors)==true){
            if(move_uploaded_file($file_tmp, $filePath)){

                $jsonArray = json_decode(file_get_contents("data.json"));

                foreach( $jsonArray as $item)
                {
                    if(isset($_SESSION['user']) && $_SESSION['user']->Username == $item->Username){
                        
                        $tmpuser = $item;
                        
                        $tmpuser->File_Path = $accPath;
                        
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
                
            }
            

        }else{
            print_r($errors);
        }

    }

?>