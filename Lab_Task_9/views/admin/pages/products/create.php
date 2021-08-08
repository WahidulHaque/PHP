<?php
session_start();
ob_start();
if (isset($_SESSION['user'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php include "../../includes/headers.php"; ?>
        <!-- LINK CSS HERE -->
        <?php include "../../includes/css.php"; ?>

    </head>

    <body>
<?php
    require "../../../../controller/admin/ProductController.php";
    $allProducts = getAll();
    $sl_product  = 1;
    $product     = null;
?>
        <section class="main">

            <!-- SIDEBAR START -->
            <?php include "../../includes/sidebar.php"; ?>

            <!-- BODY CONTENT -->
            <div class="home_content">

                <!-- TOPBAR AREA -->
                <?php include "../../includes/topbar.php"; ?>

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
                                            <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                                        </div>
                                        <div class="col">
                                            <select id="category" class="form-control" aria-placeholder="category" name="cat_id">
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
                                            <input type="text" class="form-control" placeholder="SKU CODE" id="sku_code" name="sku_code">
                                        </div>
                                        <div class="col">
                                            <select id="featured_item" class="form-control" aria-placeholder="featured_item" name="featured_item">
                                                <option value="X" selected>Choose Featured...</option>
                                                <option value="1">Featured</option>
                                                <option value="0">Not Featured</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select id="status" class="form-control" aria-placeholder="status" name="status">
                                                <option value="X" selected>Choose Status...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Tags [Separated by Comma (,)]" id="tags" name="tags">
                                        </div>
                                        <div class="col">
                                            <!-- <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="productImg" name="productImg">
                                                <label class="custom-file-label" for="productImg" id="imgLabel">Choose Product Image</label>
                                            </div> -->
                                            <div class="input-group is-invalid">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="productImg"  name="productImg" required>
                                                    <label class="custom-file-label" for="productImg" id="imgLabel">Choose file...</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Quantity" id="quantity" name="quantity" >
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Short Description" id="s_desc" name="s_desc">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2" name="submit" id="addProduct">Confirm Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </section>
        <!-- LINK script HERE -->
        <?php include "../../includes/scripts.php"; ?>

    </body>

</html>

<?php
} else {
header('location: ../login.php');
}
?>