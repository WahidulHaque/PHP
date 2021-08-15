<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/admin/img/favicon.png" type="image/x-icon" />

    <link rel="stylesheet" href="../assets/admin/lib/bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../assets/admin/css/adm_style.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

    <!-- Script Area -->
    <script src="../assets/admin/js/jquery-3.5.1.js"></script>
    <script src="../assets/admin/lib/bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>

    <title id="title">Login</title>
</head>
<body>
    
    <section class="main login-page">
        <?php
            if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
                $email = $_COOKIE['email'] ;
                $pass = $_COOKIE['password'] ;
            }
            else{
                $email = '' ;
                $pass = '';
            }
        ?>
        <div class="container">
            <div class="row form-area">
                <div class="col-md-6 m-auto">
                    <div class="login">
                        <h4>Welcome</h4>
                        <p>Please insert your login credentials <br><?php include "../config/db_config.php";?></p>
                        <form class="login_form" id="login_form" action="" method="POST">
                            <div class="form-group">
                                <label>Email or Username</label>
                                <input type="email" class="form-control" name="email" id="emailId" value="<?=$email?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password" value="<?=$pass?>">
                            </div>
                            <div class="form-group parent">
                                <a href="forgot-password.php" class="forgot">Forgot Password?</a>
                            </div>
                            <div class="form-group text-center">
                                <?php
                                    session_start();
                                    if(isset($_SESSION['loginError'])){
                                        ?>
                                            <p class="text-danger text-center"><?php echo $_SESSION['loginError'];?></p>
                                        <?php
                                    }
                                    session_destroy();
                                ?>
                                <input type="submit" class="btn btn-custom" value="Submit" name="submit" id="submitBtn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="../assets/services/LoginService.js"></script>

</body>
</html>