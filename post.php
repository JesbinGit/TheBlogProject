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

    <section class="posts container more_post">
        <?php
                $morepost_query = "SELECT * FROM tb_posts WHERE category_id = $post[category_id] AND NOT id=$post[id] LIMIT 6";
                $morepost = mysqli_query($connection, $morepost_query);
                //fetching category info [use foreign key to improve]
                $category_id = $post['category_id'];
                $category_query = "SELECT * FROM tb_categories WHERE id=$category_id";
                $category_result = mysqli_query($connection, $category_query);
                $category = mysqli_fetch_assoc($category_result);
        ?>
        <h2>Read more on <a class="more_category" href="<?=ROOT_URL?>category-post.php?id=<?=$category['id']?>"><?=$category['title']?></a></h2>

        <div class=" post__container">
            
            <?php while($mpost = mysqli_fetch_assoc($morepost)) : ?>
                <article  class="post">
                    <div class="post_thumbnail">
                        <img src="images/<?=$mpost['thumbnail']?>">
                    </div>
                 <div class="post__info">
                     <h3 class="post__title"><a href="<?=ROOT_URL?>post.php?id=<?=$mpost['id']?>"> <?=$mpost['title']?> </a> </h3>
                        <p class="post_body"> <?=substr($mpost['body'],0,100)?>..... </p>
                     <?php
                            //fetch author info  [use forign key to improve]
                            $author_id = $mpost['author_id'];
                            $author_query = "SELECT * FROM tb_users WHERE id=$author_id";
                            $author_result = mysqli_query($connection, $author_query);
                            $author = mysqli_fetch_assoc($author_result);
                     ?>
                        <div class="post__author">
                            <div class="post__author-avatar">
                                <img src="images/<?=$author['avatar']?>">
                            </div>
                            <div class="post__author-info.jpg">
                                <h5>By: <?="{$author['firstname']} {$author['lastname']}"?></h5>
                                <small><?= date("d M, Y - H:i", strtotime($mpost['date_time']))?> </small>
                            </div>
                     </div>
                    </div>
                </article>
            <?php endwhile ?>
        </div>
    </section>

<?php 
    require 'partials/footer.php';
?>