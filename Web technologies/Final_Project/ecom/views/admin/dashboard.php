<?php
    include "../../config/db_config.php";
    include "../../controller/admin/OrderController.php";
    include "../../controller/admin/ReviewController.php";

    session_start();
    ob_start();
    if(isset($_SESSION['user'])){
        $sql_query      = "select * from products";
        $allProducts    = mysqli_query($db, $sql_query);
        $sl_product     = 1;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php include "includes/headers.php"; ?>
        <!-- LINK CSS HERE -->
        <?php include "includes/css.php"; ?>

    </head>

<body>

    <section class="main">

        <!-- SIDEBAR START -->
        <?php include "includes/sidebar.php";?>

        <!-- BODY CONTENT -->
        <div class="home_content">

            <!-- TOPBAR AREA -->
            <?php include "includes/topbar.php";?>

            <div class="content_area">
                <div class="row db-toprow">
                    <div class="col-md-3">
                        <div class="dash-box">
                            <div class="icon-box">
                                <i class="bx bx-store"></i>
                            </div>
                            <div class="text-box">
                                <h4><?=mysqli_num_rows($allProducts)?></h4>
                                <p>Total Products</p>       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dash-box">
                            <div class="icon-box">
                                <i class="bx bx-store"></i>
                            </div>
                            <div class="text-box">
                                <h4><?=mysqli_num_rows(getAllOrders())?></h4>
                                <p>Total Orders</p>       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dash-box">
                            <div class="icon-box">
                                <i class="bx bx-store"></i>
                            </div>
                            <div class="text-box">
                                <h4><?=mysqli_num_rows(getAllReviews())?></h4>
                                <p>Total Customers</p>       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dash-box">
                            <div class="icon-box">
                                <i class="bx bx-store"></i>
                            </div>
                            <div class="text-box">
                                <h4><?=mysqli_num_rows(getAllCategory())?></h4>
                                <p>Total Category</p>       
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row db-midrow">
                    <div class="col-md-7">
                        <div class="table-box">
                            <div class="tbl-head">
                                <h4>Product Summary</h4>
                                <a href="product.php?do=Manage" class="btn btn-custom">View All</a>
                            </div>
                            <table class="table">
                                <thead>
                                    <th>Sl.</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>

                                <?php
                                    while($item = mysqli_fetch_object($allProducts) ){
                                        ?>
                                            <tr>
                                                <td><?=$sl_product++?></td>
                                                <td><?=$item->title?></td>
                                                <td><?=$item->quantity?> Pcs</td>
                                                <td>BDT.<?=$item->regular_price?></td>
                                                <td>
                                                    <?php
                                                        if($item->status == 1){
                                                            ?>
                                                                <span class="badge badge-success">Active</span>
                                                            <?php
                                                        }
                                                        else if($item->status == 0){
                                                            ?>
                                                                <span class="badge badge-danger">Inactive</span>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="table-box">
                            <div class="tbl-head">
                                <h4>Order Summary</h4>
                                <a href="products.html" class="btn">View All</a>
                            </div>
                            <table class="table">
                                <thead>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ABC</td>
                                        <td>50</td>
                                        <td>Active</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Script Area -->
    <script src="../../assets/admin/js/jquery-3.5.1.js"></script>
    <script src="../../assets/admin/lib/bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="../../assets/admin/services/SearchService.js"></script>
    <script src="../../assets/admin/js/adm_script.js"></script>
    
    <!-- LINK Footer HERE -->
    <?php //include "includes/footer.php";?>

</body>
</html>

<?php
    }
    else{
        header('location: ../login.php');
    }
?>