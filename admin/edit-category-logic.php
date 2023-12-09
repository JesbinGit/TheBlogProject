<?php 
    require 'config/database.php';

    if(isset($_POST['submit'])){
        //get updated form data
        $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        

        //Check for valid input
        if(empty($title) || empty($description)){
            $_SESSION['edit-category'] = "Invalid form Input on Edit page.";
            header('location: '. ROOT_URL . 'admin/edit-category.php?id='. $id);
            die();
        } else{
            //update category info
            $query = "UPDATE tb_categories SET  title='$title', description='$description' WHERE id=$id  LIMIT 1 ";
            $result = mysqli_query($connection, $query);

            if(mysqli_errno($connection)){
                $_SESSION['edi-category'] = "Failed Update category info.";
            } else{
                $_SESSION['edit-category-success'] = "Updated category to $title successfully.";
            }
        }

    }

    header('location: '. ROOT_URL . 'admin/manage-categories.php');
?>