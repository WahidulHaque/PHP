<?php
    session_start();
    ob_start();
    include "../../controller/admin/CouponController.php";
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
                                                    <h4 id="tbl-title">Coupons List</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row action-area justify-content-end">
                                                        <div class="col-md-8">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="coupons.php?do=Create" class="btn btn-add btn-custom" style="width: -webkit-fill-available;"><i class="fas fa-plus mr-2"></i>Add New</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th>Sl.</th>
                                                    <th>Code</th>
                                                    <th>Discount</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Purchase Type</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?=writeTable(getAllCoupons())?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    else if(isset($_GET['do']) && $_GET['do'] == "Edit"){
                        $getCoupon = (isset($_GET['edit_id'])) ? getCoupon($_GET['edit_id']) : null;
                        if(!empty($getCoupon)){
                            ?>
                                <div class="content_area">
                                    <div class="row db-toprow">
                                        <div class="col-md-12">
                                            <div class="table-box">
                                                <div class="tbl-head row">
                                                    <div class="col-md-5">
                                                        <h4>Edit Coupon</h4>
                                                    </div>
                                                </div>
                                                <form action="../../controller/admin/CouponController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Coupon Code" name="code" value="<?=$getCoupon->code?>">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Discount" name="discount" value="<?=$getCoupon->discount?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="date" class="form-control" name="startDate" value="<?=$getCoupon->startDate?>">
                                                        </div>
                                                        <div class="col">
                                                            <input type="date" class="form-control"  name="endDate" value="<?=$getCoupon->endDate?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <select class="form-control" aria-placeholder="purchase_type" name="purchase_type">
                                                                <option value="X" selected>Choose Featured...</option>
                                                                <option value="1" <?php if($getCoupon->purchase_type == 1){ echo "selected"; }?> >One Time</option>
                                                                <option value="0" <?php if($getCoupon->purchase_type == 0){ echo "selected"; }?> >Multiple Time</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select id="status" class="form-control" aria-placeholder="status" name="status">
                                                                <option value="X" selected>Choose Status...</option>
                                                                <option value="1" <?php if($getCoupon->status == 1){ echo "selected"; }?>>Active</option>
                                                                <option value="0" <?php if($getCoupon->status == 0){ echo "selected"; }?>>Not Active</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="c_id" value="<?=$getCoupon->id?>">
                                                    <button type="submit" class="btn btn-primary mb-2" name="edit_coupon">Confirm Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    else if(isset($_GET['do']) && $_GET['do'] == "Create"){
                        ?>
                            <div class="content_area">
                                <div class="row db-toprow">
                                    <div class="col-md-12">
                                        <div class="table-box">
                                            <div class="tbl-head row">
                                                <div class="col-md-5">
                                                    <h4>Add New Coupon</h4>
                                                </div>
                                            </div>
                                            <form action="../../controller/admin/CouponController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Coupon Code" name="code">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Discount" name="discount">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="date" class="form-control" name="startDate">
                                                    </div>
                                                    <div class="col">
                                                        <input type="date" class="form-control"  name="endDate">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <select class="form-control" aria-placeholder="purchase_type" name="purchase_type">
                                                            <option value="X" selected>Choose Featured...</option>
                                                            <option value="1">One Time</option>
                                                            <option value="0">Multiple Time</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <select id="status" class="form-control" aria-placeholder="status" name="status">
                                                            <option value="X" selected>Choose Status...</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mb-2" name="add_coupon">Confirm Save</button>
                                            </form>
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