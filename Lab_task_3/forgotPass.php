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
    <form action="validation/chnagePassValidation.php" method="post">
        <fieldset>
            <legend><h1>Forgot Password</h1></legend>
            Current pass :<input type="text" name="current" ><br>
            New Password  :<input type="password" name="new"><br>
            Retype Password  :<input type="password" name="retype"><br>
            <hr>
            <button type="submit" name="submit">Submit</button>
        </fieldset>
    </form>
</body>
</html>