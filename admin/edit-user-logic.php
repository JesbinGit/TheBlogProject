<?php 
    require 'config/database.php';

    if(isset($_POST['submit'])){
        //get updated form data
        $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $is_admin = filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);

        //Check for valid input
        if(empty($firstname) || empty($lastname)){
            $_SESSION['edit-user'] = "Invalid form Input on Edit page.";
            header('location: '. ROOT_URL . 'admin/edit-user.php?id='. $id);
            die();
        } else{
            //update user info
            $query = "UPDATE tb_users SET firstname='$firstname', lastname='$lastname', is_admin=$is_admin WHERE id=$id  LIMIT 1 ";
            $result = mysqli_query($connection, $query);

            if(mysqli_errno($connection)){
                $_SESSION['edit-user'] = "Failed Update User info.";
            } else{
                $_SESSION['edit-user-success'] = "Updated to $firstname $lastname successfully.";
            }
        }

    }

    header('location: '. ROOT_URL . 'admin/manage-users.php');
?>