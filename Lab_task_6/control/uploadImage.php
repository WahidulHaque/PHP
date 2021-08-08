<?php
    session_start();
    require "../config/db.php";

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
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 4194304){ //For 4mb = 4 * 1024 * 1024
            $errors[]='File size must be excately 4 MB';
        }
        
        $filePath = "../assets/img/". $file_name ;

        $accPath = $file_name ;
        $sql = "select * from users where id=".$_SESSION['user']->id;
        $result = mysqli_query($db, $sql);
        echo mysqli_num_rows($result);

        if(empty($errors) == true && mysqli_num_rows($result) > 0){
            while($item = mysqli_fetch_object($result)){
                if(move_uploaded_file($file_tmp, $filePath)){
                    if(isset($_SESSION['user']) && $item->id === $_SESSION['user']->id){
                        $sql_update = "UPDATE `users` SET 
                                        `image`='".$accPath."'
                                        where 'id'=".$item->id;
                        $updateResult = mysqli_query($db, $sql_update);
                        if($updateResult){
                            $_SESSION['user']->image = $accPath;
                            if($_SESSION['user']->role == 0){
                                header('Location: ../layers/admin/profile.php');
                            }
                        }
                        else{
                            echo 505;
                        }
                    }
                }
            }
        }
        else{
            print_r($errors);
        }

    }

?>