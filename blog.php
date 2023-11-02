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
    <section class="search__bar">
        <form class ="container search__bar-container"action="">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="" placeholder="Search">
                <button type="submit" class="btn">Search</button>
            </div>
        </form>
    </section>





 <!-- ================ END OF Search ================-->
    <section class ="posts" >
        <div class="container post__container">
            <article  class="post">
            <div class="post_thumbnail">
                <img src="/images/b2.png">
            </div>
            
            <div class="post__info">
                <a href=""class="category__button"> Art </a>
                <h3 class="post__title"><a href="post.php">Randome post title 2</a> </h3>
                <p class="post_body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias natus iste explicabo ad corporis totam ipsam! Dignissimos culpa eius excepturi ut necessitatibus totam deleniti. Alias molestiae ea sapiente sunt inventore.     
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="/images/jennie.jpg">
                    </div>
                    <div class="post__author-info.jpg">
                        <h5> Danny Cumsalot </h5>
                        <small> March 17, 2001 </small>
                    </div>

                </div>
            </div>
            </article>
            <article class="post">
                <div class="post_thumbnail">
                    <img src="/images/b2.png">
                </div>
                
                <div class="post__info">
                    <a href=""class="category__button"> Art </a>
                    <h3 class="post__title"><a href="post.php">Randome post title 2</a> </h3>
                    <p class="post_body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias natus iste explicabo ad corporis totam ipsam! Dignissimos culpa eius excepturi ut necessitatibus totam deleniti. Alias molestiae ea sapiente sunt inventore.     
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="/images/jennie.jpg">
                        </div>
                        <div class="post__author-info.jpg">
                            <h5> Danny Cumsalot </h5>
                            <small> March 17, 2001 </small>
                        </div>
    
                    </div>
                </div>
             </article>
             <article class="post">
                <div class="post_thumbnail">
                    <img src="/images/b2.png">
                </div>
                
                <div class="post__info">
                    <a href=""class="category__button"> Art </a>
                    <h3 class="post__title"><a href="post.php">Randome post title 2</a> </h3>
                    <p class="post_body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias natus iste explicabo ad corporis totam ipsam! Dignissimos culpa eius excepturi ut necessitatibus totam deleniti. Alias molestiae ea sapiente sunt inventore.     
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="/images/jennie.jpg">
                        </div>
                        <div class="post__author-info.jpg">
                            <h5> Danny Cumsalot </h5>
                            <small> March 17, 2001 </small>
                        </div>
    
                    </div>
                </div>
                </article>
                <article class="post">
                    <div class="post_thumbnail">
                        <img src="/images/b2.png">
                    </div>
                    
                    <div class="post__info">
                        <a href=""class="category__button"> Art </a>
                        <h3 class="post__title"><a href="post.php">Randome post title 2</a> </h3>
                        <p class="post_body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias natus iste explicabo ad corporis totam ipsam! Dignissimos culpa eius excepturi ut necessitatibus totam deleniti. Alias molestiae ea sapiente sunt inventore.     
                        </p>
                        <div class="post__author">
                            <div class="post__author-avatar">
                                <img src="/images/jennie.jpg">
                            </div>
                            <div class="post__author-info.jpg">
                                <h5> Danny Cumsalot </h5>
                                <small> March 17, 2001 </small>
                            </div>
        
                        </div>
                    </div>
                    </article>
            
        </div>
    </section>

 <!-- ================ END OF POSTS ================-->
    <section class="category__buttons">
        <div class="container category__button-container">
            <a href="" class="category__button">Wild Life</a>
            <a href="" class="category__button">Art</a>
            <a href="" class="category__button">Food</a>
            <a href="" class="category__button">Music</a>
            <a href="" class="category__button">Tech</a>
            <a href="" class="category__button">Self Growth</a>
        </div>

    </section>
    <!-- ================ END OF CATEGORY BUTTONS ================-->

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