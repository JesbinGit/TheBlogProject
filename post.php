<?php 
    require 'partials/header.php';

    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM tb_posts WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $post = mysqli_fetch_assoc($result);
      } else {
        header('location: '. ROOT_URL );
      }
?>


    <section class="singlepost">
        <div class="container singlepost__container">
            
            <h2><?=$post['title']?></h2>
            
            <div class="post__author">
                <?php
                    //fetch author info  [use forign key to improve]
                    $author_id = $post['author_id'];
                    $author_query = "SELECT * FROM tb_users WHERE id=$author_id";
                    $author_result = mysqli_query($connection, $author_query);
                    $author = mysqli_fetch_assoc($author_result);
                    
                ?>

                <div class="post__author-avatar">
                    <img src="images/<?=$author['avatar']?>">
                </div>
                
                <div class="post__author-info.jpg">
                    <h5>By: <?="{$author['firstname']} {$author['lastname']}"?> </h5>
                    <small> <?= date("d M, Y - H:i", strtotime($post['date_time']))?></small>
                </div>
            
            </div>
            <div class="singlepost__thumbnail">
                <img src="images/<?=$post['thumbnail']?>">
                </div>
                <p><?=$post['body']?></p>
            </div>   
     </section>



    <!-- ================ END OF SINGLE POST ================-->


<?php 
    require 'partials/footer.php';
?>