<?php




    require 'config/database.php';


    if (isset($_POST['submit'])) {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname  = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT );
        $avatar = $_FILES['avatar'];

        // Validate input values
        if (empty($firstname)) {
            $_SESSION['add-user'] = "Please enter  First name";
        } else if (empty($lastname)) {
            $_SESSION['add-user'] = "Please enter  Last name";
        } else if (empty($username)) {
            $_SESSION['add-user'] = "Please enter  User name";
        } else if (empty($email)) {
            $_SESSION['add-user'] = "Please enter a valid Email address";
        } else if (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
            $_SESSION['add-user'] = "Password should be more than 8 characters";
        } else if (empty($avatar['name'])) {
            $_SESSION['add-user'] = "Please add an avatar";
        } else if ($createpassword !== $confirmpassword) {
            $_SESSION['add-user'] = "Passwords don't match";
        } else {
            // Hash the password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

             //check whether the username or email already exit in database

             $user_check_query = "SELECT * FROM tb_users WHERE username = '$username' OR email ='$email'";
             $user_check_result = mysqli_query($connection, $user_check_query);
             if(mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['add-user'] = "User already exist";
             }
             else{
                // rename avatar names cause same name files may exist
                $time = time(); //using time as unique key for pics to make image names random
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;
                //id code that is unique
                $idcode = rand(0 , 9999);
                $idname = $idcode;

                //validating avatar
                $allowed_files = ['png','jpg','jpeg','JPG','PNG','JPEG'];
                $extenstion = explode('.', $avatar_name);
                $extenstion = end($extenstion);
                if (in_array($extenstion, $allowed_files)){
                    // if yes check image is  not too large (1mb+)
                    if($avatar['size'] < 1000000){
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = "Image is too large , should be less than 1 mb";
                    }    
                }else {
                    $_SESSION['add-user'] = "Unsupported Formatt, File should be .jpg .jpeg .png "; 
                }
                
             }
            }   
            //redirect back to add-user page incase of any Error

            if(isset($_SESSION['add-user'])) {
                // pass data back to add-user page to avoid annoying ass retyping shii

                $_SESSION['add-user-data'] = $_POST;
                header('location: ' . ROOT_URL . 'admin/add-user.php');
                die();
            }
            else{
                //insert user into table
                $insert_user_query = "INSERT INTO tb_users (id , firstname , lastname , username , email , password , avatar , is_admin) VALUES ('$idname', '$firstname','$lastname', '$username', '$email', '$hashed_password', '$avatar_name', '$is_admin' )";

                $insert_user_result = mysqli_query($connection, $insert_user_query);


                if(!mysqli_errno($connection)){
                    $_SESSION['add-user-success'] = "New User $username has been successfully added";
                    header('location: ' . ROOT_URL . 'admin/manage-users.php');
                    die();
                }
            }

    } else {
        header('location: ' . ROOT_URL . '/admin/add-user.php' );
        die();
    }
?>