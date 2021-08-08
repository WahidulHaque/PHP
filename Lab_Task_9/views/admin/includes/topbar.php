<?php
    if(strpos($_SERVER['REQUEST_URI'], "pages/")){
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
                            <img src="https://www.pngkey.com/png/full/114-1149878_setting-user-avatar-in-specific-size-without-breaking.png" alt="">
                            <div class="name_job">
                                <div class="name"><?= (isset($_SESSION['user'])) ? $_SESSION['user']['name'] : "Demo Name"; ?></div>
                                <div class="job">Super Admin</div>
                            </div>
                        </div>
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
                <a href="pages/profile.html" class="profile_btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="profile">
                        <div class="profile_details">
                            <img src="https://www.pngkey.com/png/full/114-1149878_setting-user-avatar-in-specific-size-without-breaking.png" alt="">
                            <div class="name_job">
                                <div class="name"><?= (isset($_SESSION['user'])) ? $_SESSION['user']['name'] : "Demo Name"; ?></div>
                                <div class="job">Super Admin</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php
    }
?>