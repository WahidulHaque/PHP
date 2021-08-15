<?php
    if(strpos($_SERVER['REQUEST_URI'], "product")){
        ?>
        <div class="topbar">
            <div class="search_box">
                <i class='bx bx-search-alt'></i>
                <input type="text" placeholder="Search" class="search">
            </div>

            <!-- PROFILE -->
            <div class="profile_content dropdown">
                <a href="pages/profile.html" class="profile_btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="profile">
                        <div class="profile_details">
                            <img src="../../assets/img/users/<?=$_SESSION['user']['image']?>" alt="">
                            <div class="name_job">
                                <div class="name"><?= (isset($_SESSION['user'])) ? $_SESSION['user']['name'] : "Demo Name"; ?></div>
                                <div class="job"><?= ($_SESSION['user']['user_type'] == "ADM") ? "Super Admin" : ""; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profile.php?do=Manage">Profile</a>
                        <a class="dropdown-item" href="change-pass.php">Change Password</a>
                        <a class="dropdown-item" href="../../controller/LogoutController.php">Logout</a>
                    </div>
                </a>
            </div>
        </div>
        <?php
    }
    else{
        ?>
        <div class="topbar">
            <div class="search_box">
                <!-- <i class='bx bx-search-alt'></i>
                <input type="text" placeholder="Search" class="search"> -->
            </div>

            <!-- PROFILE -->
            <div class="profile_content dropdown">
                <a href="pages/profile.html" style="" class="profile_btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="profile">
                        <div class="profile_details">
                            <img src="../../assets/img/users/<?=$_SESSION['user']['image']?>" alt="">
                            <div class="name_job">
                                <div class="name"><?= (isset($_SESSION['user'])) ? $_SESSION['user']['name'] : "Demo Name"; ?></div>
                                <div class="job"><?= ($_SESSION['user']['user_type'] == "ADM") ? "Super Admin" : ""; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profile.php?do=Manage">Profile</a>
                        <a class="dropdown-item" href="change-pass.php">Change Password</a>
                        <a class="dropdown-item" href="../../controller/LogoutController.php">Logout</a>
                    </div>
                </a>
            </div>
        </div>
        <?php
    }
?>