<?php 
    require 'partials/header.php';

    //fetch all post from DB 
    $query = "SELECT * FROM tb_posts ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
?>


    <section class="search__bar">
        <form class ="container search__bar-container"action="<?=ROOT_URL?>search.php" method="GET">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="search" placeholder="Search">

                <button type="submit" name="submit" class="btn">Search</button>
            </div>
        </form>
    </section>


 <!-- ================ END OF Search ================-->
 <section class ="posts section_extra-margin" >

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