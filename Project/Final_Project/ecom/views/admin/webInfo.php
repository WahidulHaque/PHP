<?php
    session_start();
    ob_start();
    include "../../controller/admin/WebInfoController.php";
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
                    $info = getInfo();
                ?>
                    <div class="content_area">
                        <div class="row db-toprow">
                            <div class="col-md-12">
                                <div class="table-box">
                                    <div class="tbl-head row">
                                        <div class="col-md-5">
                                            <h4 id="tbl-title">Website Informations</h4>
                                        </div>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <th scope="row">Brand Name</th>
                                            <td><?=$info->title?></td>
                                            <td colspan="4">
                                                <img src="../../assets/img/<?=$info->image?>" width="200px" height="200px" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile</th>
                                            <td><?=$info->contact_no?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Shop Address</th>
                                            <td><?=$info->address?></td>
                                        </tr>
                                    </table>
                                    <a href="webinfo.php?do=Edit&edit_id=<?=$info->id?>" class="btn btn-outline-secondary">EDIT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else if (isset($_GET['do']) && $_GET['do'] == "Edit") {
                    $item = (isset($_GET['edit_id'])) ? getDetail($_GET['edit_id']) : null;
                    if (!empty($item)) {
                    ?>
                        <div class="content_area">
                            <div class="row db-toprow">
                                <div class="col-md-12">
                                    <div class="table-box">
                                        <div class="tbl-head row">
                                            <div class="col-md-5">
                                                <h4>Edit Informations</h4>
                                            </div>
                                        </div>
                                        <form action="../../controller/admin/WebInfoController.php" method="post" enctype="multipart/form-data" >
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Title" name="title" value="<?= $item->title ?>">
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Title" name="contact_no" value="<?= $item->contact_no ?>">
                                                </div>

                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Title" name="address" value="<?= $item->address ?>">
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="input-group is-invalid">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="productImg"  name="image" required>
                                                            <label class="custom-file-label" for="productImg" id="imgLabel">Choose file...</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <input type="hidden" name="id" value="<?=$item->id?>">
                                            <button type="submit" class="btn btn-outline-success btn-lg mb-2 text-center m-auto d-flex justify-content-center" name="edit" id="editCat">Confirm Save</button>
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