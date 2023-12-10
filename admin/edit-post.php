<?php 
    require 'partials/header.php';
    
    //checks for post id 
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM tb_posts WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $post = mysqli_fetch_assoc($result);
    } else {
        header('location: '. ROOT_URL . 'admin/');
        die();
    }

    //Fetch category info from DB
    $category_query = "SELECT * FROM tb_categories";
    $categories = mysqli_query($connection, $category_query);

?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Post</h2>

            <?php if(isset($_SESSION['edit-post'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['edit-post']; 
                        unset($_SESSION['edit-post']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

        <form action="<?=ROOT_URL?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">

            <input type="hidden" name="id" value="<?=$post['id']?>">
            <input type="hidden" name="previous_thumbnail" value="<?=$post['thumbnail']?>">
           
            <input type="text" name="title" value="<?=$_SESSION['edit-post-data']['title'] ?? $post['title']?>" placeholder="Title">
            
            <select name="category_id" >
                
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                   
                    <?php if($category['id'] == $_SESSION['edit-post-data']['category_id']) : ?>
                        <option value="<?=$category['id']?>" selected><?=$category['title']?></option>
                    <?php else : ?>
                        <option value="<?=$category['id']?>"><?=$category['title']?></option>
                    <?php endif ?>

                <?php endwhile ?>

            </select>

            <textarea rows="10" name="body" placeholder="Body"><?=$_SESSION['edit-post-data']['body'] ?? $post['body']?></textarea>
            
            <?php if(isset($_SESSION['user_is_admin'])) : ?>
           
                <div class="form_control inline">
                    <label for="is_featured">Featured</label>
                    
                    <?php $status = $_SESSION['edit-post-data']['is_featured'] ?? $post['is_featured'] ;if( $status == 1) : ?>
                        <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <?php else : ?>
                        <input type="checkbox" name="is_featured" value="1" id="is_featured" >
                    <?php endif ?>

                </div>

            <?php endif ?>
           
            <div class="form_control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <?php unset($_SESSION['edit-post-data']); ?>
            <button type="submit" name="submit" class="btn">Update Post</button>
            
        </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>