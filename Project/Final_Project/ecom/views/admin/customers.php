<?php
    session_start();
    ob_start();
    include "../../controller/admin/CustomerController.php";
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
                                                    <h4 id="tbl-title">Customers List</h4>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th>Sl.</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Membership</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?=writeTable(getAll())?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    else if(isset($_GET['do']) && $_GET['do'] == "Edit"){
                        $item = (isset($_GET['edit_id'])) ? getCustomer($_GET['edit_id']) : null;
                        if(!empty($item)){

                            ?>
                                <div class="content_area">
                                    <div class="row db-toprow">
                                        <div class="col-md-12">
                                            <div class="table-box">
                                                <div class="tbl-head row">
                                                    <div class="col-md-5">
                                                        <h4>Edit Customer Details</h4>
                                                    </div>
                                                </div>
                                                <form action="../../controller/admin/CustomerController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="text" class="form-control" disabled placeholder="Full Name" value="<?=$item->full_name?>">
                                                            <input type="hidden" name="name" value="<?=$item->name?>">
                                                        </div>
                                                        <div class="col">
                                                            <input type="email" class="form-control" disabled placeholder="Email Address" value="<?=$item->email?>">
                                                            <input type="hidden" name="email" value="<?=$item->email?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="text" class="form-control" disabled value="<?=$item->phone?>">
                                                            <input type="hidden" name="phone" value="<?=$item->phone?>">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" disabled value="<?=$item->address?>">
                                                            <input type="hidden" name="address" value="<?=$item->address?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <select id="status" class="form-control" aria-placeholder="status" name="status">
                                                                <option value="X" selected>Choose Status...</option>
                                                                <option value="1" <?php if($item->status == 1){ echo "selected"; }?>>Active</option>
                                                                <option value="0" <?php if($item->status == 0){ echo "selected"; }?>>Not Active</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"  disabled name="image">
                                                                <label class="custom-file-label" for="image">Choose file...</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="c_id" value="<?=$item->id?>">
                                                    <button type="submit" class="btn btn-primary mb-2" name="edit_customer">Confirm Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    else if(isset($_GET['do']) && $_GET['do'] == "View"){
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