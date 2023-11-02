<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
   
    <link rel = "stylesheet" href="./css/style.css">
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
                <li><a href = "blog.php"> Blog  </a> </li>
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

    <section class="singlepost">
        <div class="container singlepost__container">
            <h2> The assasination of Julius Ceaser</h2>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="/images/jisoo.jpg">
                </div>
                <div class="post__author-info.jpg">
                    <h5> Steven Dicksirleot </h5>
                    <small> Septemeber 11, 2001 </small>
                </div>
            </div>
                <div class="singlepost__thumbnail">
                    <img src="/images/b3.webp">
                </div>
            
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius ipsa neque, repudiandae architecto, nostrum quam distinctio facilis fugit aliquam saepe pariatur laudantium libero ab. Ut aut dolorem facere at dolorum?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius ipsa neque, repudiandae architecto, nostrum quam distinctio facilis fugit aliquam saepe pariatur laudantium libero ab. Ut aut dolorem facere at dolorum?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius ipsa neque, repudiandae architecto, nostrum quam distinctio facilis fugit aliquam saepe pariatur laudantium libero ab. Ut aut dolorem facere at dolorum?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius ipsa neque, repudiandae architecto, nostrum quam distinctio facilis fugit aliquam saepe pariatur laudantium libero ab. Ut aut dolorem facere at dolorum?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius ipsa neque, repudiandae architecto, nostrum quam distinctio facilis fugit aliquam saepe pariatur laudantium libero ab. Ut aut dolorem facere at dolorum?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius ipsa neque, repudiandae architecto, nostrum quam distinctio facilis fugit aliquam saepe pariatur laudantium libero ab. Ut aut dolorem facere at dolorum?</p>
        </div>   
     </section>



    <!-- ================ END OF SINGLE POST ================-->

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



</body>
</html>