<div class="sidebar">

    <!-- SIDEBAR LOGO -->
    <div class="logo_content">
        <div class="logo">
            <i class='bx bxl-firebase' ></i>
            <div class="logo_name">Ecommerce</div>
        </div>
        <i class='bx bx-menu' id="btn-sidebar"></i>
    </div>

    <!-- MENU ITEMS -->
    <ul class="nav_list list-unstyled">
        <li>
            <a href="dashboard.php">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip-x">Dashboard</span>
        </li>
        
        <li>
            <a href="<?=(strpos($_SERVER['REQUEST_URI'], "pages/")) ? "../../pages/products/manage.php" : "pages/products/manage.php"?>">
                <i class='bx bxl-product-hunt' ></i>
                <span class="links_name">Products</span>
            </a>
            <span class="tooltip-x">Products</span>
        </li>
        
    </ul>

</div>