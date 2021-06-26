<?php //session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB TASK 2</title>
</head>
<body>
    <form action="validation/loginValidation.php" method="post">
        <fieldset>
            <legend><h1>Login</h1></legend>
            Username :<input type="text" name="username" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];} ?>"><br>
            Password  :<input type="password" name="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>"><br>
            <hr>
            <input type="checkbox" name="remember" value> Remember Me <br>
            <button type="submit" name="submit">Submit</button> <a href="forgotPass.php">Forgot Password</a>
        </fieldset>
        
    </form>
</body>
</html>