<?php
    include "../config/db_config.php";  //include the database configuration file to connect with database
    session_start();                    // start session to store variable data in session

    if(isset($_POST['submit'])){
        if(empty($_POST['email']) || empty($_POST['password'])){
            echo "<h4>Invalid Input</h4>";
        }
        else{
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            $sql        = "SELECT * FROM users where email='$email' and password = '$password'";

            $alluser = mysqli_query($db, $sql); // EXECUTE QUERY

            while( $row = mysqli_fetch_assoc($alluser) ){
                $user  = array(
                    'id'            => $row['id'],
                    'name'          => $row['name'],
                    'email'         => $row['email'],
                    'phone'         => $row['phone'],
                    'address'       => $row['address'],
                    'image'         => $row['image'],
                    'user_type'     => $row['user_type'],
                );

                if(($email == $user['email']) && ($password == $row['password'])){
                    if($user['user_type'] == 'ADM'){
                        $_SESSION['user'] = $user;
                        setcookie('email', $email, time() + (86400 * 30), "/");         //SET EMAIL ADDRESS IN COOKIE FOR 30 DAYS
                        setcookie('password', $password, time() + (86400 * 30), "/");   //SET PASSWORD IN COOKIE FOR 30 DAYS
                        $sql = "INSERT INTO `log_detail`(`user_id`, `login_time`) 
                                VALUES ('". $user['id'] ."','". time() ."')";
                        $result = mysqli_query($db, $sql);
                        echo "true";
                        break;
                    }
                }
            } 
            
            if(mysqli_num_rows($alluser) == 0){
                $_SESSION['loginError'] = 'Invalid Information...';
                header('location: ../views/login.php');
            }
        }
    }
    else{

    }
?>