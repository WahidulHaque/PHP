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
                                <h1>BUS-AGENCY</h1>
                            </th>
                            <th style="text-align:right; border: 1px solid black;">
                                LOGGED IN AS <?=$_SESSION['user']->Username?>
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
                                    <legend>Profile</legend>
                                    <table>
                                        <tr>
                                            <td colspan=2>Name</td>
                                            <td>:</td>
                                            <td><?=$_SESSION['user']->Name?></td>
                                            <td rowspan=3>

                                            <img width="140px"
                                                <?php 
                                                    if(isset($_SESSION['user']) && isset($_SESSION['user']->File_Path)){
                                                        echo  'src="../../assets/img/'. $_SESSION['user']->File_Path   .'"';
                                                    }
                                                    else{
                                                        echo 'src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"';
                                                    } 
                                                ?>
                                                alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan=4><hr></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2>Email</td>
                                            <td>:</td>
                                            <td><?=$_SESSION['user']->Email?></td>
                                        </tr>
                                        <tr>
                                            <td colspan=4><hr></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2>Gender</td>
                                            <td>:</td>
                                            <td><?=$_SESSION['user']->Gender?></td>
                                            <td><a href="changeImage.php">Change</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan=4><hr></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2>Date Of Birth</td>
                                            <td>:</td>
                                            <td><?=$_SESSION['user']->DOB?></td>
                                        </tr>
                                        <tr>
                                            <td colspan=4><hr></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2>
                                                <a href="editProfile.php">Edit Profile</a>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            </html>
        <?php
    }
    else{
        header('Location: ../login.php');
    }
?>
