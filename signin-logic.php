<?php
require 'config/constants.php';

$connection = mysqli_connect('localhost','theblog','admin123','db_blog');

if(isset($_POST['submit']))
{
    //get form data
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email)
    {
        $_SESSION['signin'] = "Please enter an username or email";
    }
    elseif(empty($password))
    {
        $_SESSION['signin'] = "Please enter a password";
    }
    else {
        //fetch user from database

        $fetch_user_query = "SELECT * FROM tb_users WHERE username = '$username_email'  OR email = '$username_email'";

        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1 ) {

            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            //compare hashed password to user pass
            if(password_verify($password, $db_password)){
                //SET session for access (this makes the user actually logged in)
                $_SESSION['user_id'] = $user_record['id'];
                // check if admin or not
                 if($user_record['is_admin'] == 1 ) {
                    $_SESSION['user_is_admin'] = true;
                 }
                 // log user in 
                 header('location:' . ROOT_URL .'index.php');
            }
            else 
            {
                $_SESSION['signin'] = "Please check your entered data.";
            }

        } else 
        {
            $_SESSION['signin'] = "User not found";
        }


    }

}

//if any other problem , redirect back to login page
if(isset($_SESSION['signin'])) {
    $_SESSION['signin-data'] = $_POST;
    header('location: '. ROOT_URL . 'signin.php');
}

else {
    header('location:'. ROOT_URL . 'index.php');
}

?>