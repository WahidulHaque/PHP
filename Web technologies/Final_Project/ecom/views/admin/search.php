<?php
session_start();
ob_start();
if (isset($_SESSION['user'])) {
    $sl_product  = 1;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php include "../includes/headers.php"; ?>
        
        <!-- CSS -->
        <link rel="shortcut icon" href="../../../assets/admin/img/favicon.png" type="image/x-icon" />
        <link rel="stylesheet" href="../../../assets/admin/lib/bootstrap-4.6.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="../../../assets/admin/css/adm_style.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
        <section class="main">

            <!-- SIDEBAR START -->
            <?php include "../includes/sidebar.php"; ?>

            <!-- BODY CONTENT -->
            <div class="home_content">

                <!-- TOPBAR AREA -->
                <?php include "../includes/topbar.php"; ?>

                <div class="content_area">
                    <div class="row db-toprow">
                        <div class="col-md-12">
                            <div class="table-box">
                                <div class="tbl-head row">
                                    <div class="col-md-5">
                                        <h4>Search Results For : <span class="s_data"></span></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row action-area justify-content-end">
                                            <div class="col-md-8">
                                                <select name="filter" id="filter_pr" class="form-control">
                                                    <?php
                                                        $allCategory = getAllCategory();
                                                        while($item = mysqli_fetch_object($allCategory)){
                                                            $childs = getChildCategories($item->id);
                                                            if($item->is_parent == 0 && mysqli_num_rows($childs) > 0){
                                                                ?>
                                                                    <option value="<?=$item->id?>"><?=$item->cat_name?></option>
                                                                <?php
                                                                
                                                                if(mysqli_num_rows($childs) > 0){
                                                                    while($child_item = mysqli_fetch_object($childs)){
                                                                    ?>
                                                                        <option value="<?=$child_item->id?>">--<?=$child_item->cat_name?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                            else if($item->is_parent == 0 && mysqli_num_rows($childs) == 0){
                                                                ?>
                                                                    <option value="<?=$item->id?>"><?=$item->cat_name?></option>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="create.php" class="btn btn-add btn-custom" style="width: -webkit-fill-available;"><i class="fas fa-plus mr-2"></i>Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <th>Sl.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Short Description</th>
                                        <th>Regular Price</th>
                                        <th>Offer Price</th>
                                        <th>Featured Item</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody id="searchProducts">
                                    <?php
                                        while ($item = mysqli_fetch_object($allProducts)) {
                                    ?>
                                            <tr>
                                                <td><?= $sl_product++ ?></td>
                                                <td>
                                                    <img src="<?=(!empty($item->image)) ? "assets/img/products/".$item->image : "";?>" alt="">
                                                </td>
                                                <td><?=$item->title ?></td>
                                                <td>
                                                    <?php
                                                        $category = getCategory($item->cat_id);
                                                        while($row = mysqli_fetch_object($category)){
                                                            echo $row->cat_name;
                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td><?=substr($item->s_desc, 0, 50)?></td>
                                                <td>BDT.<?= $item->regular_price ?></td>
                                                <td>BDT.<?= $item->offer_price ?></td>
                                                <td>
                                                    <?php
                                                        if ($item->featured_item == 1) {
                                                            ?>
                                                                <span class="badge badge-success">Featured</span>
                                                            <?php
                                                        } else{
                                                            ?>
                                                                <span class="badge badge-danger">Not Featured</span>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td><?=$item->quantity ?> Pcs</td>
                                                <td>
                                                    <?php
                                                        if ($item->status == 1) {
                                                            ?>
                                                                <span class="badge badge-success">Active</span>
                                                            <?php
                                                        } else if ($item->status == 0) {
                                                            ?>
                                                                <span class="badge badge-danger">Inactive</span>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="edit.php?edit=<?=$item->id?>" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>
                                                    
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#pr_<?=$item->id?>">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                    <div class="modal fade" id="pr_<?=$item->id?>" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title font-weight-bold text-warning" id="exampleModalLongTitle">Warning</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Do you want to delete Product : <?=$item->title?> permanently?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="" method="post" id="df_<?=$item->id?>">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <input type="hidden" id="pid_<?=$item->id?>" value="<?=$item->id?>">
                                                                        <button type="submit" class="btn btn-primary dlt" id="btnConfirmDelete_<?=$item->id?>">Confirm Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- LINK script HERE -->
        <?php include "../includes/scripts.php"; ?>

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