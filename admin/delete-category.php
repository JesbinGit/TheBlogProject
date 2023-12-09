<?php
    require 'config/database.php';

    if(isset($_GET['id'])){ 
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM tb_categories WHERE id=$id ";
        $result = mysqli_query($connection, $query);
        $category = mysqli_fetch_assoc($result);

        $title=$category['title'];

        ///Making sure we got only one category info
        if(mysqli_num_rows($result)==1){
            //Delete category from DataBase
            $delete_category_query =  "DELETE FROM tb_categories WHERE id=$id LIMIT 1";
            $delete_category_result = mysqli_query($connection,$delete_category_query);
            if(mysqli_errno($connection)){
                $_SESSION['delete-category'] = "Couldn't Delete category $title ";
            } else{
                $_SESSION['delete-category-success'] = "Removed category $title Successfully";
            }
        }
    }

    header('location: '. ROOT_URL . '/admin/manage-categories.php');

?>