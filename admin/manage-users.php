<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
   
    <link rel = "stylesheet" href="./style.css">
    <!--Icon Scout cdn for icons like the three lines or unicons-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!--this is from google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class = "container nav_container">
            <a href="index.php" class="nav_logo"> The Blog Project </a>
            <ul class ="nav_items">
                <li><a href = "ourstory.php"> Our Story </a> </li>
                <li><a href = "contact.php"> Contact Us </a> </li>
                <li><a href = "signin.php"> Sign in  </a> </li>
                <li class ="nav_profile"> 
                    <div class ="avatar">
                        <img src="/images/jisoo.jpg">
                    </div>
                    <ul>
                        <li> <a = href="dashboard.php"> Dashboard </a> </li>
                        <li> <a = href="logout.php"> Logout </a> </li>

                    </ul>


                </li>
            </ul>


            <button id = "open_nav-btn"><i class="uil uil-bars"></i> </button>
            <button id = "close_nav-btn"> <i class="uil uil-times-circle"></i></button>
        </div>

    </nav>
    <!-- ================ END OF NAVIGATION BAR ================-->



<section class="dashboard">
    <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                    <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php"><i class="uil uil-postcard"></i>
                    <h5>Manage Posts</h5>
                    </a>
                </li>
                <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                    <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php" class="active"><i class="uil uil-users-alt"></i>
                    <h5>Manage Users</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                    <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php" ><i class="uil uil-list-ul"></i>
                    <h5>Manage Categories</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Privilege</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jack Rand</td>
                        <td>Jack43</td>
                        <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                        <td>Admin</td>
                    </tr>
                    <tr>
                        <td>Fedrick Riche</td>
                        <td>Fred</td>
                        <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                        <td>Moderator</td>
                    </tr>
                    <tr>
                        <td>Jack Rand</td>
                        <td>Jack43</td>
                        <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                        <td>Author</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</section>


<!--========================Footer========================-->
<footer>
    <div class="footer__socials">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-youtube"></i></a>
         <!-- ================ target blank so it opens in a new tab ================-->
         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-instagram"></i></a>
         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-reddit-alien-alt"></i></a>
         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-facebook"></i></a>
         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-twitter"></i></a>

    </div>
    <div class="container footer__container">

        <article>
            <h4> Categories</h4>
            <ul>
                <li><a href="">Art</a></li>
                <li><a href="">Tech</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Music</a></li>
                <li><a href="">Self Growth</a></li>
                <li><a href="">Wild Life</a></li>

            </ul>
        </article>
        <article>
            <h4> Support</h4>
            <ul>
                <li><a href="">Social Support</a></li>
                <li><a href="">Email</a></li>
                <li><a href="">Local Numbers</a></li>
                <li><a href="">Online Complaints </a></li>
                <li><a href="">Queries</a></li>
                <li><a href="">Location</a></li>

            </ul>
        </article>
     
        </article>
        <article>
            <h4> Blog</h4>
            <ul>
                <li><a href="">Terms</a></li>
                <li><a href="">Updates</a></li>
                <li><a href="">News</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Team</a></li>


            </ul>
        </article>
    </div>
        <div class=" footer__copyright">

            <small> Copyright &copy; Yo Momma So Big Corporations 2069</small>

        </div>

    


</footer>

<script src="main.js"></script>

</body>
</html>