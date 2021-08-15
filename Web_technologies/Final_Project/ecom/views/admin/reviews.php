<?php
    session_start();
    ob_start();
    include "../../controller/admin/ReviewController.php";
    if (isset($_SESSION['user'])) {
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
            <?php include "includes/sidebar.php"; ?>

            <!-- BODY CONTENT -->
            <div class="home_content">

                <!-- TOPBAR AREA -->
                <?php include "includes/topbar.php"; ?>

                <?php
                    if(isset($_GET['do']) && $_GET['do'] == "Manage"){
                        ?>
                            <div class="content_area">
                                <div class="row db-toprow">
                                    <div class="col-md-12">
                                        <div class="table-box">
                                            <div class="tbl-head row">
                                                <div class="col-md-5">
                                                    <h4 id="tbl-title">Reviews List</h4>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th>Sl.</th>
                                                    <th>Review By</th>
                                                    <th>Product Name</th>
                                                    <th>Review Description</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?=writeTableReview(getAllReviews())?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>

            </div>

        </section>
        <!-- LINK script HERE -->
        <?php include "includes/scripts.php"; ?>

        <!-- LINK Footer HERE -->
        <?php //include "includes/footer.php";
        ?>

    </body>

    </html>

<?php
} else {
    header('location: ../login.php');
}
?>