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
                if (isset($_GET['do']) && $_GET['do'] == "Manage") {
                ?>
                    <div class="content_area">
                        <div class="row db-toprow">
                            <div class="container">
                                <div class="row gutters-sm">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="../../assets/img/users/<?=$_SESSION['user']['image']?>" alt="Admin" class="rounded-circle" width="150">
                                                    <div class="mt-3">
                                                        <h4><?=$_SESSION['user']['name']?></h4>
                                                        <p class="text-secondary mb-1"><?= ($_SESSION['user']['user_type'] == "ADM") ? "Super Admin" : ""; ?></p>
                                                        <p class="text-muted font-size-sm"><?=$_SESSION['user']['address']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?=$_SESSION['user']['name']?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?=$_SESSION['user']['email']?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Phone</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?=$_SESSION['user']['phone']?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?=$_SESSION['user']['address']?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a class="btn btn-info" href="profile.php?do=Edit&edit_id=<?=$_SESSION['user']['id']?>">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else if (isset($_GET['do']) && $_GET['do'] == "Edit") {
                    $item = (isset($_GET['edit_id'])) ? getMethod($_GET['edit_id']) : null;
                    if (!empty($item)) {

                    ?>
                        <div class="content_area">
                            <div class="row db-toprow">
                                <div class="col-md-12">
                                    <div class="table-box">
                                        <div class="tbl-head row">
                                            <div class="col-md-5">
                                                <h4>Update Profile</h4>
                                            </div>
                                        </div>
                                        <form action="../../controller/admin/UserController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= $item->name ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?= $item->email ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="phone" value="<?= $item->phone ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="address" value="<?= $item->address ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image">
                                                        <label class="custom-file-label" for="image">Choose file...</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="u_id" value="<?= $item->id ?>">
                                            <button type="submit" class="btn btn-primary mb-2" name="edit_user">Confirm Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
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