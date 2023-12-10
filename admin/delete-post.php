<?php
    require 'config/database.php';

    if(isset($_GET['id'])){ 
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM tb_posts WHERE id=$id ";
        $result = mysqli_query($connection, $query);
        $post = mysqli_fetch_assoc($result);

        $title=$post['title'];

        ///Making sure we got only one post info
        if(mysqli_num_rows($result)==1){
            $thumbnail_name =$post['thumbnail'];
            $thumbnail_path = '../images/' . $thumbnail_name;
            //Delete thumbnail if available
            if($thumbnail_path) {
                unlink($thumbnail_path);


                //Delete post from DB
                $delete_post_query =  "DELETE FROM tb_posts WHERE id=$id LIMIT 1";
                $delete_post_result = mysqli_query($connection,$delete_post_query);
                if(mysqli_errno($connection)){
                    $_SESSION['delete-post'] = "Couldn't Delete post $title ";
                } else{
                    $_SESSION['delete-post-success'] = "Removed post $title Successfully";
                }
            } 
        }
    }

    header('location: '. ROOT_URL . 'admin/');

?>