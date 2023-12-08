<?php 
    require 'partials/header.php';

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
            <input type="text" name="firstname" value="<?= $user['firstname']?>" placeholder="First name">
            <input type="text" name="lastname" value="<?= $user['lastname']?>" placeholder="Last name">
            <select name="userrole" >
                <option value="1">Author</option>
                <option value="0">Moderator</option>
                <option value="0">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User Info</button>
         </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>