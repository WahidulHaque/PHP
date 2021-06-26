<!DOCTYPE html>
<html>
<head>

<title>Registration Form </title>

</head>
<body>
    <h1>Registration Form</h1>
    <form action="validation/regValidation.php" method="post">
    <table>
        <tr>
            <td> Full Name : </td>
            <td><input type="text" name="name">
        </tr>

        <tr>
            <td> Username : </td>
            <td><input  type="text" name="username">
        </tr>


        <tr>
        <td> Email :  </td>
        <td><input type="text" name="email"> 
        </tr>


        <tr>
            <td>Password :  </td>
            <td><input type="password" name="password">
        </tr>

        <tr>
            <td> Retype Password :  </td>
            <td><input type="password" name="retype">
        </tr>

        <tr>
            <td> Gender : </td>
            <td>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio"  name="gender" value="Other"> Other <br>
            </td>
        </tr>

        <tr>
            <td>Date Of Birth</td>
            <td>
                <input type="text" name="day" placeholder="dd">/
                <input type="text" name="month" placeholder="mm">/
                <input type="text" name="year" placeholder="year">
            </td>
        </tr>


        <tr>
            <td> <input type="submit" name="submit" value="Submit">
            <input type="reset" name="Reset">
            </td>
        </tr>
    </table>

    </form>

</body>
</html>