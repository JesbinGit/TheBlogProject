<?php


session_start(); // Initialize the session

require 'config/database.php';


if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname  = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // Validate input values
    if (empty($firstname)) {
        $_SESSION['signup'] = "Please enter your First name";
    } else if (empty($lastname)) {
        $_SESSION['signup'] = "Please enter your Last name";
    } else if (empty($username)) {
        $_SESSION['signup'] = "Please enter your User name";
    } else if (empty($email)) {
        $_SESSION['signup'] = "Please enter a valid Email address";
    } else if (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Password should be more than 8 characters";
    } else if (empty($avatar['name'])) {
        $_SESSION['signup'] = "Please add an avatar";
    } else if ($createpassword !== $confirmpassword) {
        $_SESSION['signup'] = "Passwords don't match";
    } else {
        // Hash the password
        $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
         //couldnt find some small error for an hour so just rewrote the code upto here.
         //same sanam thane but just some difference in else cycle.

         //check whether the username or email already exit in database

         $user_check_query = "SELECT * FROM tb_users WHERE username = '$username' OR email ='$email'";
         $user_check_result = mysqli_query($connection, $user_check_query);
         if(mysqli_num_rows($user_check_result) > 0) {
            $_SESSION['signup'] = "User already exist";
         }
         else{
            //avatar stuff
            // rename avatar names cause same name files may exist
            $time = time(); //using time as unique key for pics to make image names random
            $avatar_name = $time . $avatar['name'];
            $avatar_tmp_name = $avatar['tmp_name'];
            $avatar_destination_path = 'images/' . $avatar_name;

            //validating avatar
            $allowed_files = ['png','jpg','jpeg'];
            $extenstion = explode('.', $avatar_name);
            $extenstion = end($extenstion);
            if (in_array($extenstion, $allowed_files)){
                // if yes check image is  not too large (1mb+)
                if($avatar['size'] < 10000000){
                    move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                } else {
                    $_SESSION['signup'] = "Image is too large , should be less than 1 mb or  Image file should be jpg , png or jpeg";
                }    
            }
         }
        }   
        //redirect back to signup page incase of signup

        if(isset($_SESSION['signup'])) {
            // pass data back to signup page to avoid annoying ass retyping shii
            
            $_SESSION['signup-data'] = $_POST;
            header('location: ' . ROOT_URL . 'signup.php');
            die();
        }
        else{
            //insert user into table
            $insert_user_query = "INSERT INTO tb_users (firstname , lastname , username , email , password , avatar , is_admin) VALUES ('$firstname','$lastname', '$username', '$email', '$hashed_password', '$avatar_name', 0 )";

            $insert_user_result = mysqli_query($connection, $insert_user_query);
            
            
            if(!mysqli_errno($connection)){
                $_SESSION['signup-sucess'] = "Registration successful. Please log in.";
                header('location: ' . ROOT_URL . 'signin.php');
                die();
            }
        }

} else {
    // If the signup button is not clicked, redirect to the signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();

   
}

