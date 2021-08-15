<?php
    if(!include_once("../../config/db.php")){
        include "../../config/db.php";
    }
    
    if(isset($_POST['dataCat']) && $_POST['dataCat'] == "allCat"){
        echo json_encode(
            array(
                "cat_content" => writeCategorySelect(),
                "status" => true 
            )
        );
    }

    if(isset($_POST['cat_all']) && $_POST['cat_all'] == "allCat"){
        $allCategory = writeTableCategory( getAllParent() );
        $return_arr  = array(
            "content" => $allCategory,
            "success" => true
        );
        echo json_encode($return_arr);
    }
    

    function getAllCategory(){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `categories`";
        $result     = mysqli_query($db, $sql_query);
        
        return $result;
    }

    function getAllParent(){
        $db = dbConnection();
        $sql_query  = "select * from categories where is_parent=0";
        $result     = mysqli_query($db, $sql_query);

        return $result;
    }

    function getCategory($id){
        $db = dbConnection();
        $sql_query  = "SELECT * FROM `categories` WHERE id=".$id;
        $result     = mysqli_query($db, $sql_query);
        return $result;
    }

    function getChildCategories($id){
        $db = dbConnection();
        $sql_query  = "select * from categories where is_parent=".$id;
        $result     = mysqli_query($db, $sql_query);

        return $result;
    }

    function createCategory($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "INSERT INTO categories (cat_name, cat_slug, cat_description, is_parent, featured, status, cat_image)
                            VALUES('". $input->name ."','". $input->slug ."','". $input->desc ."','". $input->is_parent ."',
                            '". $input->featured ."','". $input->status ."','". $input->cat_image ."')";

            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function deleteCategory($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM categories where id=".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function updateCategory($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "UPDATE categories set cat_name='". $input->name ."', cat_slug='". $input->slug ."', 
                            cat_description='". $input->desc ."', is_parent='". $input->is_parent ."', featured='". $input->featured ."',
                            status='". $input->status ."', cat_image='". $input->cat_image ."' WHERE id=". $input->id;

            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function writeTableCategory($data){
        $markUp = "";
        if(isset($data)){
            $sl = 1;
            while($item = mysqli_fetch_object($data)){
                $status         = ($item->status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                $featured_item  = ($item->featured == 1) ? '<span class="badge badge-success">Featured</span>' : '<span class="badge badge-danger">Not Featured</span>';
                $childs         = getChildCategories($item->id);
                $markUp .= '<tr>
                                <td>'.  $sl++ .'</td>
                                <td>'. $item->cat_name .'</td>
                                <td><span class="badge badge-info">-</span></td>
                                <td>'. substr($item->cat_description, 0, 50) .'</td>
                                <td>'. $featured_item .'</td>
                                <td>'. $status .'</td>
                                <td>
                                    <a href="category.php?do=Edit&edit_id='. $item->id .'" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>
                                    
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#pr_'.$item->id.'">
                                        <i class="far fa-trash-alt"></i>
                                    </button>

                                    <div class="modal fade" id="pr_'.$item->id.'" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold text-warning" id="exampleModalLongTitle">Warning</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete Product : '.$item->cat_name.' permanently?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post" id="df_'.$item->id.'">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" id="pid_'.$item->id.'" value="'.$item->id.'">
                                                        <button type="submit" class="btn btn-primary dlt" id="btnConfirmDelete_'.$item->id.'">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                if(mysqli_num_rows($childs) > 0){
                    while($child_cat = mysqli_fetch_object($childs)){
                        $status_c           = ($child_cat->status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                        $featured         = ($child_cat->featured == 1) ? '<span class="badge badge-success">Featured</span>' : '<span class="badge badge-danger">Not Featured</span>';
                        $markUp .= '<tr>
                                <td>'.  $sl++ .'</td>
                                <td>'. $child_cat->cat_name .'</td>
                                <td><span class="badge badge-info">'. $item->cat_name .'</span></td>
                                <td>'. substr($child_cat->cat_description, 0, 50) .'</td>
                                <td>'. $featured .'</td>
                                <td>'. $status_c .'</td>
                                <td>
                                    <a href="category.php?do=Edit&edit_id='. $child_cat->id .'" class="btn btn-outline-info" ><i class="far fa-edit"></i></a>
                                    
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#pr_'.$child_cat->id.'">
                                        <i class="far fa-trash-alt"></i>
                                    </button>

                                    <div class="modal fade" id="pr_'.$child_cat->id.'" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold text-warning" id="exampleModalLongTitle">Warning</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete Product : '.$child_cat->cat_name.' permanently?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post" id="df_'.$child_cat->id.'">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" id="cid_'.$child_cat->id.'" value="'.$child_cat->id.'">
                                                        <button type="submit" class="btn btn-primary dlt" id="btnConfirmDelete_'.$child_cat->id.'">Confirm Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                    }
                }
            }
        }
        return $markUp;
    }

    function writeCategorySelect(){
        $allCategory = getAllCategory();
        $catMarkUp   = '<option value="0">Choose Category</option>';
        while($item = mysqli_fetch_object($allCategory)){
            $childs = getChildCategories($item->id);
            if($item->is_parent == 0 && mysqli_num_rows($childs) > 0){
                $catMarkUp .= '<option value="'.$item->id.'">'.$item->cat_name.'</option>';
                if(mysqli_num_rows($childs) > 0){
                    while($child_item = mysqli_fetch_object($childs)){
                        $catMarkUp .= '<option value="'.$child_item->id .'">--'. $child_item->cat_name.'</option>';
                    }
                }
            }
            else if($item->is_parent == 0 && mysqli_num_rows($childs) == 0){
                $catMarkUp .= '<option value="'.$item->id.'">'.$item->cat_name.'</option>';
            }
        }
        return $catMarkUp;
    }

?>