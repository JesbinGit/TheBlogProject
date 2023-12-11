<?php
    require 'config/database.php';


    if(isset($_POST['submit'])){
        $author_id = $_SESSION['user_id'];
        $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $body = filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_id = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
        $is_featured = filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);
        $thumbnail = $_FILES['thumbnail'];

        // set is_featured to 0 if unchecked
        $is_featured = $is_featured == 1 ? : 0 ;

        //validate form data
        if(empty($title)){
            $_SESSION['add-post'] = "Please enter Post Title";
        }elseif(empty($body)){
            $_SESSION['add-post'] = "can not post an with empty body";
        }elseif(empty($thumbnail['name'])){
            $_SESSION['add-post'] = "Please Choose a Thumbnail";
        } else{
            //

            //rename image
            $time = time(); // time added to thumbnail name to be unique
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = "../images/" . $thumbnail_name;

            //check if file is images
            $allowed_files = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            if(in_array($extension, $allowed_files)){
                
                //Make sure image not too big (<size)
                if($thumbnail['size'] < 19999999){
                    
                    //upload thumbnail
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                } else{
                    $_SESSION['add-post'] = "Image Size too large, Should be less than 2mb";
                }
            } else{
                $_SESSION['add-post'] = "Invalid Image Format, Should be .png   .jpg   .jpeg";
            }

        }

    }

    //Redirect back [with form data] if there is any problem 
    if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data']= $_POST;
        header('location: '. ROOT_URL . 'admin/add-post.php');
        die();    
    } else{
        // Set is_featured  of all post to 0 if this post is set as featured
        if($is_featured == 1){
            $zero_all_featured_query = "UPDATE tb_posts SET is_featured=0";
            $zero_all_featured_result = mysqli_query($connection, $zero_all_featured_query);
        }

        //Transfer post to DB
        $query = "INSERT INTO tb_posts (title, body, thumbnail, category_id,author_id, is_featured) VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)){
            $_SESSION['add-post-success'] = "Successfully Posted";
            header('location: '. ROOT_URL . 'admin/');
            die();
        } else{
            $_SESSION['add-post'] = "Couldn't Post";
            $_SESSION['add-post-data']= $_POST;
            header('location: '. ROOT_URL . 'admin/add-post.php');
            die();
        }

    }

?>