<?php
    session_start();
    ob_start();
    include "../../controller/admin/PaymentController.php";
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
                                                    <h4 id="tbl-title">Payment Methods List</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row action-area justify-content-end">
                                                        <div class="col-md-8">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="payments.php?do=Create" class="btn btn-add btn-custom" style="width: -webkit-fill-available;"><i class="fas fa-plus mr-2"></i>Add New</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th>Sl.</th>
                                                    <th>Image</th>
                                                    <th>name</th>
                                                    <th>Number</th>
                                                    <th>Priority</th>
                                                    <th>Type</th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?=writeTableMethod(getAllMethods())?>
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
                                                        <h4>Edit Payment Method</h4>
                                                    </div>
                                                </div>
                                                <form action="../../controller/admin/PaymentController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Title" id="name" name="name" value="<?=$method->name?>">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Number" id="number" name="number" value="<?=$method->number?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <select id="priority" class="form-control" aria-placeholder="priority" name="priority">
                                                                <option value="X" selected>Choose type...</option>
                                                                <option value="1" <?php if($method->priority == 1){ echo "selected";}?> >High</option>
                                                                <option value="0" <?php if($method->priority == 0){ echo "selected";}?> >Low</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select id="type" class="form-control" aria-placeholder="type" name="type">
                                                                <option value="X" selected>Choose type...</option>
                                                                <option value="1" <?php if($method->type == 1){ echo "selected"; }?> >Active</option>
                                                                <option value="0" <?php if($method->type == 0){ echo "selected"; }?> >Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="productImg"  name="image">
                                                                <label class="custom-file-label" for="image" id="imageL">Choose file...</label>
                                                            </div>
                                                            <input type="hidden" name="m_id" value="<?=$method->id?>">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-outline-success btn-lg mb-2 text-center m-auto d-flex justify-content-center" name="editMethod" id="editMethod">Confirm Save</button>
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
                                                        <h4>Edit Payment Method</h4>
                                                    </div>
                                                </div>
                                                <form action="../../controller/admin/PaymentController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Title" id="name" name="name" >
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Number" id="number" name="number" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <select id="priority" class="form-control" aria-placeholder="priority" name="priority">
                                                                <option value="X" selected>Choose type...</option>
                                                                <option value="1" >High</option>
                                                                <option value="0" >Low</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select id="type" class="form-control" aria-placeholder="type" name="type">
                                                                <option value="X" selected>Choose type...</option>
                                                                <option value="1" >Active</option>
                                                                <option value="0" >Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="productImg"  name="image">
                                                                <label class="custom-file-label" for="image" id="imageL">Choose file...</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-outline-success btn-lg mb-2 text-center m-auto d-flex justify-content-center" name="add_method">Confirm Save</button>
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