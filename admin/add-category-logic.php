<?php 
    require 'config/database.php';

    if(isset($_POST['submit'])){
        //get form data
        $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(empty($title)){
            $_SESSION['add-category'] = "Enter Title";
        } elseif(empty($description)){
            $_SESSION['add-category'] = "Enter Description";
        }

        //Redirecting back to add category page if there any issue
        if(isset($_SESSION['add-category'])){
            $_SESSION['add-category-data'] = $_POST;
        }else{
            //insert catgory into database
            $query = "INSERT INTO tb_categories (title, description) VALUES ('$title', '$description')";
            $result = mysqli_query($connection,$query);
            if(mysqli_errno($connection)){
                $_SESSION['add-category'] = "Couldn't Add Category";
            } else{
                $_SESSION['add-category-success'] = "Added A new Catgory $title successfully";
                header('location: ' . ROOT_URL . 'admin/manage-categories.php');
                die();
            }
        }
    }
    
    header('location: ' . ROOT_URL . 'admin/add-category.php');
?>