<?php 
    require 'config/database.php';

    if(isset($_POST['submit'])){
        //get updated form data
        $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $previous_thumbnail_name = filter_var($_POST['previous_thumbnail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); //why not pull from DB?
        $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $body = filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_id = filter_var($_POST['category_id'],FILTER_SANITIZE_NUMBER_INT);
        $thumbnail = $_FILES['thumbnail']; 
        $is_featured = filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);

        //Sets is_featured  
        $is_featured= $is_featured == 1 ?:0;

        //Check for valid input
        if(empty($title)){
            $_SESSION['edit-post'] = "A Title is Required";
        } elseif(empty($body)){
            $_SESSION['edit-post'] = "Can not have an Empty body";
        } elseif(empty($category_id)){
            $_SESSION['edit-post'] = "Please Select a Category";
        } else{
            if($thumbnail['name']){
                //check if new thumbnail is images
                $allowed_files = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];
                $extension = explode('.', $thumbnail['name']);
                $extension = end($extension);
                if(in_array($extension, $allowed_files)){
                   
                    //Make sure image not too big (<size)
                    if($thumbnail['size'] < 2_00_000){
                        //work on new thumbnail
                        $time = time(); // time added to thumbnail name to be unique
                        $thumbnail_name = $time . $thumbnail['name'];
                        $thumbnail_tmp_name = $thumbnail['tmp_name'];
                        $thumbnail_destination_path = "../images/" . $thumbnail_name;
                        
                        //deleting existing thumbnail
                        $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
                        if($previous_thumbnail_path){
                            unlink($previous_thumbnail_path);
                        }
                         //upload new thumbnail
                        move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                    } else{
                        $_SESSION['edit-post'] = "Image Size too large, Should be less than 2mb";
                    }
                } else{
                $_SESSION['edit-post'] = "Invalid Image Format, Should be .png   .jpg   .jpeg";
                }
            }
        }
    }

    //Redirect back [with form data] if there is any problem 
    if(isset($_SESSION['edit-post'])){
        $_SESSION['edit-post-data']= $_POST;
        header('location: '. ROOT_URL . 'admin/edit-post.php?id=' . $id);
        die();    
    } else{
        // Set is_featured  of all post to 0 if this post is set as featured
        if($is_featured == 1){
            $zero_all_featured_query = "UPDATE tb_posts SET is_featured=0";
            $zero_all_featured_result = mysqli_query($connection, $zero_all_featured_query);
        }

        //Set thumnail to post from old/new
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        //Transfer post to DB
        $query = "UPDATE tb_posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)){
            $_SESSION['edit-post-success'] = "Successfully Updated Post";
            header('location: '. ROOT_URL . 'admin/');
            die();
        } else{
            $_SESSION['edit-post'] = "Couldn't Update Post";
            $_SESSION['edit-post-data']= $_POST;
            header('location: '. ROOT_URL . 'admin/edit-post.php');
            die();
        }

    }
    
    header('location: '. ROOT_URL . 'admin/');
?>