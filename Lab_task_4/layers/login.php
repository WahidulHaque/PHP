<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <section style="border: 1px solid black">
        <table width="100%">
            <thead>
                <tr>
                    <th><h1 style="text-align: left;">X-Company</h1></th>
                    <th >
                        <ul style="display: flex; list-style: none; text-align: right; justify-content: flex-end;">
                            <li><a style="text-align: right;" href="home.php">Home</a></li>
                            <li style="border-left: 2px solid green; height: 20px; margin: 0px 5px;"></li>
                            <li><a style="text-align: right;" href="login.php">Login</a></li>
                            <li style="border-left: 2px solid green; height: 20px; margin: 0px 5px;"></li>
                            <li><a style="text-align: right;" href="register.php">Register</a></li>
                        </ul>
                    </th>
                </tr>
            </thead>
        </table>
    </section>

    <section style="border: 1px solid black">
        <form action="../control/loginValidation.php" method="post">
            <fieldset>
                <legend><h1>Login</h1></legend>
                <table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="passChange.php">Forgot Password</a></td>
                        <td><a href="index.php">Home</a></td>
                    </tr>
                    <tr><td><br><br></td></tr>
                    <tr>
                        <td>Username :</td>
                        <td><input type="text" name="username" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];} ?>"><br></td>
                    </tr>
                    <tr>
                        <td>Password  :</td>
                        <td><input type="password" name="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>"><br></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="remember" value> Remember Me <br></td>
                    </tr>
                </table>
                <button type="submit" name="submit">Submit</button> 
            </fieldset>
            
        </form>
    </section>

    <section style="border: 1px solid black">
        <table width="100%">
            <tr>
                <p style="text-align: center;">Copy right</p>
            </tr>
        </table>
    </section>
</body>
</html>