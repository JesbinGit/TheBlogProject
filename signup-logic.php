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

         //check whether the username or email already exit in database

         $user_check_query = "SELECT * FROM users WHERE userename = '$username' OR email ='$email'";
         $user_check_result = mysqli_query($connection, $user_check_query);
         if(mysqli_num_rows($user_check_result) > 0) {
            $_SESSION['signup'] = "User already exist";
         }
         else{
            //work on avatar
            
         }

    

    
} else {
    // If the signup button is not clicked, redirect to the signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();

   
}
