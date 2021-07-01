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
                                    <legend><h1>Profile Picture</h1></legend>
                                    <img width="140px"
                                        <?php 
                                            if(isset($_SESSION['user'])){
                                                echo  'src="../../assets/img/'. $_SESSION['user']->File_Path   .'"';
                                            }
                                            else{
                                                echo 'src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"';
                                            } 
                                        ?>
                                        alt="">
                                        
                                    <br><br>
                                    <form action="../../control/uploadImage.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="profileImg">
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
