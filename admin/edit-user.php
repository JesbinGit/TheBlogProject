<?php 
    require 'partials/header.php';
    //checks if user id has passed through GET method(link)
  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM tb_users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
  } else {
    header('location: '. ROOT_URL . '/admin/manage-users.php');
  }

?>


<section class="form_section">
    
        <?php if(isset($_SESSION['edit-user'])): ?> <!--Shows if edit user was Unsccessfull-->
            <div class="alert_message error container">
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </div>
        <?php endif ?>

    <div class="container form_section-container">
        <h2>Change User Info</h2>
        <form action="<?=ROOT_URL?>admin/edit-user-logic.php" method="POST" >
            <div class="post__author">
                <div class="post__author-avatar">
                <img src="<?= ROOT_URL . 'images/' . $user['avatar'] ?>">
                </div>
                <div class="post__author">
                    <h4> <?= $user['username']?> </h4>
                </div>
            </div>

            <input type="hidden" name="id" value="<?=$user['id']?>" >

            <input type="text" name="firstname" value="<?= $user['firstname']?>" placeholder="First name">
            <input type="text" name="lastname" value="<?= $user['lastname']?>" placeholder="Last name">
            <select name="userrole" >
                <option value="0">Author</option>
                <!--option value="0">Moderator</option-->
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User Info</button>
         </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>