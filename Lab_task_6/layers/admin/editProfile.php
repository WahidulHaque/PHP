<?php 
    session_start();

    if(isset($_SESSION['user'])){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <table style="border-collapse: collapse;">
                    <thead>
                        <tr >
                            <th width="20%" style="text-align:left;border: 1px solid black;">
                                <h1>XYZ</h1>
                            </th>
                            <th style="text-align:right; border: 1px solid black;">
                                LOGGED IN AS <?=$_SESSION['user']->username?>
                            </th>
                            <th style="text-align:right; border: 1px solid black;">
                                <a href="../../control/logout.php">LOGOUT</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="20%" style="border: 1px solid black;">
                                <h1>Account</h1>
                                <hr>
                                <ul>
                                    <li>
                                        <a href="home.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="profile.php">View Profile</a>
                                    </li>
                                    <li>
                                        <a href="editProfile.php">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="changeImage.php">Change Profile Picture</a>
                                    </li>
                                    <li>
                                        <a href="changePass.php">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="../../control/logout.php">Logout</a>
                                    </li>
                                </ul>
                            </td>
                            <td style="padding: 25px;border: 1px solid black;" colspan=2>
                                <fieldset>
                                    <legend><h1>Profile Edit</h1></legend>
                                    <form action="../../control/profileUpdate.php" method="post">
                                        <table>
                                            <tr>
                                                <td> Full Name : </td>
                                                <td><input type="text" name="name" value="<?=$_SESSION['user']->name?>">
                                            </tr>

                                            <tr>
                                                <td> Username : </td>
                                                <td><input  type="text" name="username" value="<?=$_SESSION['user']->username?>">
                                            </tr>


                                            <tr>
                                            <td> Email :  </td>
                                            <td><input type="text" name="email" value="<?=$_SESSION['user']->email?>"> 
                                            </tr>

                                            <tr>
                                                <td> Gender : </td>
                                                <td>
                                                <input type="radio" name="gender" value="0"> Male
                                                <input type="radio" name="gender" value="1"> Female
                                                <input type="radio"  name="gender" value="2"> Other <br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Date Of Birth</td>
                                                <td>
                                                    <input type="date" name="dob" placeholder="dob">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> 
                                                    <input type="submit" name="submit" value="Submit"> 
                                                    <input type="reset" name="Reset">
                                                </td>
                                                <td>
                                                    <a href="home.php">HOME</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </fieldset>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            </html>
        <?php
    }

?>
