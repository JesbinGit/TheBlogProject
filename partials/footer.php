<footer>
        <div class="footer__socials">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-youtube"></i></a>
             <!-- ================ target blank so it opens in a new tab ================-->
             <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-instagram"></i></a>
             <a href="https://www.youtube.com/watch?v=AcRSJEhFZ-s" target="_blank"><i class="uil uil-reddit-alien-alt"></i></a>
             <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-facebook"></i></a>
             <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><i class="uil uil-twitter"></i></a>

        </div>
        <div class="container footer__container">
 
            <article>
                <h4> Categories</h4>
                <ul>
                    
                    <?php
                        $all_category_query = "SELECT * FROM tb_categories ORDER BY title;";
                        $all_category_result = mysqli_query($connection, $all_category_query);
                    ?>
                    <?php while($category = mysqli_fetch_assoc($all_category_result)) :?>
                        
                        <li><a href="<?=ROOT_URL?>category-post.php?id=<?=$category['id']?>"><?=$category['title']?></a></li>
                    <?php endwhile ?>

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

                <small> Copyright &copy; The Blog Project 2024</small>

            </div>

        


    </footer>

    <script src="<?= ROOT_URL?>js/main.js"></script>

</body>
</html>