<?php
    session_start();
    ob_start();
    include "../../controller/admin/UserController.php";
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
                                                    <h4 id="tbl-title">Administration Users List</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row action-area justify-content-end">
                                                        <div class="col-md-8">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="users.php?do=Create" class="btn btn-add btn-custom" style="width: -webkit-fill-available;"><i class="fas fa-plus mr-2"></i>Add New</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th>Sl.</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?=writeTableUser(getAllUser())?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    else if(isset($_GET['do']) && $_GET['do'] == "Edit"){
                        $method = (isset($_GET['edit_id'])) ? getMethod($_GET['edit_id']) : null;
                        
                        if(!empty($method)){
                            ?>
                                <div class="content_area">
                                <div class="row db-toprow">
                                    <div class="col-md-12">
                                        <div class="table-box">
                                            <div class="tbl-head row">
                                                <div class="col-md-5">
                                                    <h4>Add User</h4>
                                                </div>
                                            </div>
                                            <form action="../../controller/admin/UserController.php" method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?=$method->name?>">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Number" name="phone" value="<?=$method->phone?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="email" class="form-control" placeholder="Email Address"  name="email" value="<?=$method->email?>">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Address" name="address" value="<?=$method->address?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <select class="form-control" aria-placeholder="user_type" name="user_type">
                                                            <option value="X" selected>Choose type...</option>
                                                            <option value="ADM" <?php if($method->user_type == "ADM"){echo "selected";}?>>Admin</option>
                                                            <option value="MGR" <?php if($method->user_type == "MGR"){echo "selected";}?>>Manager</option>
                                                            <option value="SLM" <?php if($method->user_type == "SLM"){echo "selected";}?>>Salesman</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-control" aria-placeholder="status" name="status">
                                                            <option value="X" selected>Choose type...</option>
                                                            <option value="1" <?php if($method->status == 1){echo "selected";}?>>Active</option>
                                                            <option value="0" <?php if($method->status == 0){echo "selected";}?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"  name="image">
                                                            <label class="custom-file-label" for="image" >Choose file...</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="u_id" value="<?=$method->id?>">
                                                </div>
                                                <button type="submit" class="btn btn-outline-success btn-lg mb-2 text-center m-auto d-flex justify-content-center" name="edit_user">Confirm Save</button>
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
                                                    <h4>Add User</h4>
                                                </div>
                                            </div>
                                            <form action="../../controller/admin/UserController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Full Name" name="name" >
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Number" name="phone" >
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="email" class="form-control" placeholder="Email Address"  name="email" >
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Address" name="address" >
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <select class="form-control" aria-placeholder="user_type" name="user_type">
                                                            <option value="X" selected>Choose type...</option>
                                                            <option value="ADM" >Admin</option>
                                                            <option value="MGR" >Manager</option>
                                                            <option value="SLM" >Salesman</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-control" aria-placeholder="status" name="status">
                                                            <option value="X" selected>Choose type...</option>
                                                            <option value="1" >Active</option>
                                                            <option value="0" >Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"  name="image">
                                                            <label class="custom-file-label" for="image" >Choose file...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-outline-success btn-lg mb-2 text-center m-auto d-flex justify-content-center" name="add_user">Confirm Save</button>
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