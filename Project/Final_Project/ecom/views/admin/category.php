<?php
    session_start();
    ob_start();
    include "../../controller/admin/CategoryController.php";
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
                                                    <h4 id="tbl-title">Category List</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row action-area justify-content-end">
                                                        <div class="col-md-8">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="category.php?do=Create" class="btn btn-add btn-custom" style="width: -webkit-fill-available;"><i class="fas fa-plus mr-2"></i>Add New</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th>Sl.</th>
                                                    <th>Title</th>
                                                    <th>Child Category</th>
                                                    <th>Short Description</th>
                                                    <th>Featured</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody id="categoryList">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    else if(isset($_GET['do']) && $_GET['do'] == "Edit"){
                        $category = (isset($_GET['edit_id'])) ? getCategory($_GET['edit_id']) : null;
                        var_dump(getCategory($_GET['edit_id']));
                        if(!empty($category)){
                            ?>
                                <div class="content_area">
                                    <div class="row db-toprow">
                                        <div class="col-md-12">
                                            <div class="table-box">
                                                <div class="tbl-head row">
                                                    <div class="col-md-5">
                                                        <h4>Edit Category</h4>
                                                    </div>
                                                </div>
                                                <form action="../../controller/admin/CategoryController.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Title" id="cat_name" name="cat_name" value="<?=$category->cat_name?>">
                                                        </div>
                                                        <div class="col">
                                                            <select id="parent_cat" class="form-control" aria-placeholder="category" name="parent_cat">
                                                                <option value="">Choose Category</option>
                                                                <?php
                                                                    $allCategory = getAllCategory();
                                                                    while($item = mysqli_fetch_object($allCategory)){
                                                                        $childs = getChildCategories($item->id);
                                                                        if($item->is_parent == 0 && mysqli_num_rows($childs) > 0){
                                                                            ?>
                                                                                <option value="<?=$item->id?>" disabled><?=$item->cat_name?></option>
                                                                            <?php
                                                                            
                                                                            if(mysqli_num_rows($childs) > 0){
                                                                                while($child_item = mysqli_fetch_object($childs)){
                                                                                ?>
                                                                                    <option value="<?=$child_item->id?>"  <?php if($category->id == $child_item->id){ echo "selected";}?>>--<?=$child_item->cat_name . " " . $item->cat_name?></option>
                                                                                <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        else if($item->is_parent == 0 && mysqli_num_rows($childs) == 0){
                                                                            ?>
                                                                                <option value="<?=$item->id?>"  <?php if($category->id == $item->id){ echo "selected";}?> ><?=$item->cat_name?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <select id="featured" class="form-control" aria-placeholder="featured" name="featured">
                                                                <option value="X" selected>Choose Featured...</option>
                                                                <option value="1" <?php if($category->featured == 1){ echo "selected";}?> >Featured</option>
                                                                <option value="0" <?php if($category->featured == 0){ echo "selected";}?> >Not Featured</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select id="status" class="form-control" aria-placeholder="status" name="status">
                                                                <option value="X" selected>Choose Status...</option>
                                                                <option value="1" <?php if($category->status == 1){ echo "selected"; }?> >Active</option>
                                                                <option value="0" <?php if($category->status == 0){ echo "selected"; }?> >Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <textarea class="form-control" id="description" name="description" rows="3"><?=$category->cat_description?></textarea>
                                                            <input type="hidden" name="c_id" value="<?=$category->id?>">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-outline-success btn-lg mb-2 text-center m-auto d-flex justify-content-center" name="editCat" id="editCat">Confirm Save</button>
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
                                                    <h4>Add New Product</h4>
                                                </div>
                                            </div>
                                            <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Title" id="cat_name" name="cat_name">
                                                    </div>
                                                    <div class="col">
                                                        <select id="is_parent" class="form-control" aria-placeholder="category" name="is_parent">
                                                            <option value="0">Choose Parent Category</option>
                                                            <?php
                                                                $allCategory = getAllCategory();
                                                                while($item = mysqli_fetch_object($allCategory)){
                                                                    if($item->is_parent == 0){
                                                                        ?>
                                                                            <option value="<?=$item->id?>" disabled><?=$item->cat_name?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Regular Price" id="regular_price" name="regular_price">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Offer Price" id="offer_price" name="offer_price">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <select id="featured" class="form-control" aria-placeholder="featured" name="featured">
                                                            <option value="X" selected>Choose Featured...</option>
                                                            <option value="1">Featured</option>
                                                            <option value="0">Not Featured</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <select id="status" class="form-control" aria-placeholder="status" name="status">
                                                            <option value="X" selected>Choose Status...</option>
                                                            <option value="1">Featured</option>
                                                            <option value="0">Not Featured</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="cat_image"  name="cat_image">
                                                            <label class="custom-file-label" for="cat_image" id="imgLabel">Choose file...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mb-2" name="submit" id="addCat">Confirm Save</button>
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