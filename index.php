<?php 
    require 'partials/header.php';

    //featured post
    $featured_query = "SELECT * FROM tb_posts WHERE is_featured=1";
    $featured_result = mysqli_query($connection, $featured_query);
    $featured_post = mysqli_fetch_assoc($featured_result);

    //fetch upto 9 post
    $query = "SELECT * FROM tb_posts ORDER BY date_time DESC LIMIT 9";
    $posts = mysqli_query($connection, $query);

?>
     

    <!--Show featured if any-->
    <?php if(mysqli_num_rows($featured_result)==1) : ?>
        <section class=" featured">
           <div class="container featured__container" >
              <div class = "post_thumbnail">
                <img src = "images/<?=$featured_post['thumbnail']?>">
              </div> 
              
              <div class="page__info">
                
                <?php 
                    //fetching category info [use foreign key to improve]
                    $category_id = $featured_post['category_id'];
                    $category_query = "SELECT * FROM tb_categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                ?>
                <a href="<?=ROOT_URL?>category-post.php?id=<?=$category['id']?>" class="category__button"> <?=$category['title']?></a>
                
                <h2 class="post__title"> <a href="<?=ROOT_URL?>post.php?id=<?=$featured_post['id']?>"><?=$featured_post['title']?></a></h2>
                <p class="post_body"> <?=substr($featured_post['body'],0,300)?>....</p>
              
                <div class="post__author">
                    <?php
                        //fetch author info  [use forign key to improve]
                        $author_id = $featured_post['author_id'];
                        $author_query = "SELECT * FROM tb_users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                        
                    ?>
                    <div class="post__author-avatar">
                        <img src="images/<?=$author['avatar']?>">
                    </div>
                    <div class="post__author-info.jpg">
                        <h5>By: <?="{$author['firstname']} {$author['lastname']}"?></h5>
                        <small> <?= date("d M, Y - H:i", strtotime($featured_post['date_time']))?></small>
                    </div>
                </div>
              </div>
           </div>
    </section>
    <?php endif ?>
    
 <!-- ================ END OF FEATURED POST ================-->
 
 <section class ="posts <?=!empty($featured) ? '' : 'section_extra-margin' ?> " >

        <div class="container post__container">

            <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                <article  class="post">
                    <div class="post_thumbnail">
                        <img src="images/<?=$post['thumbnail']?>">
                    </div>
                
                    <div class="post__info">
                        
                    <?php 
                        //fetching category info [use foreign key to improve]
                        $category_id = $post['category_id'];
                        $category_query = "SELECT * FROM tb_categories WHERE id=$category_id";
                        $category_result = mysqli_query($connection, $category_query);
                        $category = mysqli_fetch_assoc($category_result);
                    ?>

                    <a href="<?=ROOT_URL?>category-post.php?id=<?=$category['id']?>" class="category__button"><?=$category['title']?></a>
                        <h3 class="post__title"><a href="<?=ROOT_URL?>post.php?id=<?=$post['id']?>"> <?=$post['title']?> </a> </h3>
                        <p class="post_body"> <?=substr($post['body'],0,200)?>..... </p>
                        
                        <?php
                            //fetch author info  [use forign key to improve]
                            $author_id = $post['author_id'];
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
                                <small><?= date("d M, Y - H:i", strtotime($post['date_time']))?> </small>
                            </div>
                
                        </div>
                    </div>
                </article>
            <?php endwhile ?>
            
        </div>
    </section>

 <!-- ================ END OF POSTS ================-->
    <section class="category__buttons">
        <div class="container category__button-container">
            <?php
                $all_category_query = "SELECT * FROM tb_categories ORDER BY title;";
                $all_category_result = mysqli_query($connection, $all_category_query);
            ?>
            <?php while($category = mysqli_fetch_assoc($all_category_result)) :?>
                
                <a href="<?=ROOT_URL?>category-post.php?id=<?=$category['id']?>" class="category__button"><?=$category['title']?></a>

            <?php endwhile ?>
        </div>

    </section>
    <!-- ================ END OF CATEGORY BUTTONS ================-->


<?php 
    require 'partials/footer.php';
?>