<?php 
    require '../config/database.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
   
    <link rel = "stylesheet" href="<?= ROOT_URL?>css/style.css">
    <!--Icon Scout cdn for icons like the three lines or unicons-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!--this is from google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class = "container nav_container">
            <a href="<?= ROOT_URL?>" class="nav_logo"> The Blog Project </a>
            <ul class ="nav_items">
                <li><a href = "<?= ROOT_URL?>blog.php"> Blog  </a> </li>
                <li><a href = "<?= ROOT_URL?>ourstory.php"> Our Story </a> </li>
                <li><a href = "<?= ROOT_URL?>contact.php"> Contact Us </a> </li>
                <li><a href = "<?= ROOT_URL?>signin.php"> Sign in  </a> </li>
                
                <li class ="nav_profile"> 
                    <div class ="avatar">
                        <img src="/images/jisoo.jpg">
                    </div>
                    <ul>
                        <li> <a href="<?= ROOT_URL?>admin/index.php"> Dashboard </a> </li>
                        <li> <a href="<?= ROOT_URL?>logout.php"> Logout </a> </li>

                    </ul>


                </li>
            </ul>


            <button id = "open_nav-btn"><i class="uil uil-bars"></i> </button>
            <button id = "close_nav-btn"> <i class="uil uil-times-circle"></i></button>
        </div>

    </nav>
    <!-- ================ END OF NAVIGATION BAR ================-->