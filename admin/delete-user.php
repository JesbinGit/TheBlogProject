<?php
    require 'config/database.php';

    if(isset($_GET['id'])){ 
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM tb_users WHERE id=$id ";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);

        $username=$user['username'];

        ///Making sure we got only one user info
        if(mysqli_num_rows($result)==1){
            $avatar_name = $user['avatar'];
            $avatar_path = '../images/' . $avatar_name;
            //Delete image if available
            if($avatar_path) {
                unlink($avatar_path);


                //Delete user from DataBase
                $delete_user_query =  "DELETE FROM tb_users WHERE id=$id LIMIT 1";
                $delete_user_result = mysqli_query($connection,$delete_user_query);
                if(mysqli_errno($connection)){
                    $_SESSION['delete-user'] = "Couldn't Delete User $username ";
                } else{
                    $_SESSION['delete-user-success'] = "Removed User $username Successfully";
                }
            } 
        }
      } else {
        header('location: '. ROOT_URL . '/admin/manage-users.php');
      }

      header('location: '. ROOT_URL . '/admin/manage-users.php');

?>