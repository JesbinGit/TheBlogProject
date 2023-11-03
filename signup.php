<?php 
require 'config/constants.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
   
    <link rel = "stylesheet" href=./css/style.css>
    <!--Icon Scout cdn for icons like the three lines or unicons-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!--this is from google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,800&display=swap" rel="stylesheet">
</head>
<body>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Join TheBlogProject</h2>
        <div class="alert_message success">
            <p>This is a error message</p>
        </div> 
        <form  action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method= "POST" >
            <input type="text" name ="firstname" placeholder="First name">
            <input type="text" name ="lastname" placeholder="Last name">
            <input type="text" name ="username" placeholder="User name">
            <input type="email" name ="email" placeholder="Email">
            <input type="password" name ="createpassword" placeholder="Create Password">
            <input type="password" name ="confirmpassword" placeholder="Confirm Password">
        
            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <div class="signup_bar">
                <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an Account? <a href="signin.php">Sign In!</a></small>
                
            </div>
         </form>
    </div>
</section>


</body>
</html>