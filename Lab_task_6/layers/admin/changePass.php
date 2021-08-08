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
                                    <legend><h1>Change Password</h1></legend>
                                    <form action="../../control/passwordUpdate.php" method="post" enctype="multipart/form-data">
                                        <table>
                                            <tr>
                                                <td>Current Password</td>
                                                <td>:</td>
                                                <td><input type="text" name="current" ><br></td>
                                            </tr>
                                            <tr>
                                                <td>New Password</td>
                                                <td>:</td>
                                                <td><input type="text" name="new" ><br></td>
                                            </tr>
                                            <tr>
                                                <td>Retype Password</td>
                                                <td>:</td>
                                                <td><input type="text" name="retype" ><br></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <button type="submit" name="submit">Submit</button>
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
