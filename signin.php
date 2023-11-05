<?php 

require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['sigin-data']);
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
        <h2>Sign In</h2>
       <?php if(isset($_SESSION['signup-success'])): ?>
        <div class="alert_message success">
            <?= $_SESSION['signup-success'];
            unset($_SESSION['signup-success']);
             ?>
        </div>
        <?php elseif (isset($_SESSION['signin'])) : ?>
        <div class="alert_message error">
            <?= $_SESSION['signin'];
            unset($_SESSION['signin']);
             ?>
        </div>
     <?php endif ?> 
        
        

        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name ="username_email" value = "<?= $username_email ?>" placeholder="Username or Email">
            <input type="password" name = "password"  value = "<?=$password ?>" placeholder="Password">
            <button type="submit" name="submit" class="btn center">Sign In</button>
            <small >Don't have an Account? <a href="signup.php">Sign Up!</a></small>
         </form>
    </div>
</section>


</body>
</html>