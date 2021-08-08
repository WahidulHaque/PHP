<?php
    function getAllCategory(){
        $db = dbConnection();
        $sql_query  = "select * from categories";
        $result     = mysqli_query($db, $sql_query);

        return $result;
    }

    function getCategory($id){
        $db = dbConnection();
        $sql_query  = "select * from categories where id=".$id;
        $result     = mysqli_query($db, $sql_query);

        return $result;
    }

    function getChildCategories($id){
        $db = dbConnection();
        $sql_query  = "select * from categories where is_parent=".$id;
        $result     = mysqli_query($db, $sql_query);

        return $result;
    }

    function create($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "INSERT INTO categories (cat_name, cat_slug, cat_description, is_parent, featured, status, cat_image)
                            VALUES('". $input->name ."','". $input->slug ."','". $input->desc ."','". $input->is_parent ."',
                            '". $input->featured ."','". $input->status ."','". $input->cat_image ."')";

            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function delete($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "DELETE FROM categories where id=".$input;
            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

    function update($input){
        $db = dbConnection();
        if(!empty($input)){
            $sql_query = "UPDATE categories set cat_name='". $input->name ."', cat_slug='". $input->slug ."', 
                            cat_description='". $input->desc ."', is_parent='". $input->is_parent ."', featured='". $input->featured ."',
                            status='". $input->status ."', cat_image='". $input->cat_image ."' WHERE id=". $input->id;

            $result     = mysqli_query($db, $sql_query);
            return $result;
        }
    }

?>