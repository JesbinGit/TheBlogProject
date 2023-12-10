<?php 
    require 'partials/header.php';

    //checks if category id has passed through GET method(link)
  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM tb_categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);
  } else {
    header('location: '. ROOT_URL . 'admin/manage-categories.php');
  }

?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Category</h2>

        <?php if(isset($_SESSION['edit-category'])): ?> <!--Shows if edit category was Unsccessfull-->
            <div class="alert_message error ">
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </div>
        <?php endif ?>

        <form action="<?=ROOT_URL?>admin/edit-category-logic.php" method="POST" >

            <input type="hidden" name="id" value="<?=$category['id']?>" >

            <input type="text" name="title" value="<?= $category['title']?>" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description"><?= $category['description']?></textarea>
            <button type="submit" name="submit" class="btn">Update Category</button>
         </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>