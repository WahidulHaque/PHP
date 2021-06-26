<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB TASK 2</title>
</head>
<body>
    <form action="validation/profileValidation.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><h1>Profile Picture</h1></legend>
            <img 
                <?php 
                    if(isset($_SESSION['user'])){
                        echo  'src="'. $_SESSION['user']->File_Path   .'"';
                    }
                    else{
                        echo 'src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"';
                    } 
                ?>
                alt="">
                
            <br><br>
            <input type="file" name="profileImg">
            <hr>
            <button type="submit" name="submit">Submit</button>
            <hr>
            <a href="forgotPass.php">Forgot Password?</a>
        </fieldset>
    </form>
    
</body>
</html>