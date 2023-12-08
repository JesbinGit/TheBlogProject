<?php 
    require 'partials/header.php';

    // get back data when error
    $firstname = $_SESSION['add-user-data'] ?? null;

?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Add User</h2>
        
        <?php if(isset($_SESSION['add-user'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['add-user']; 
                    unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <form action=" <?= ROOT_URL ?>admin/add-user-logic.php " enctype="multipart/form-data" method="POST" >
            <input type="text" name="firstname" placeholder="First name">
            <input type="text" name="lastname" placeholder="Last name">
            <input type="text" name="username" placeholder="User name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="createpassword" placeholder="Create Password">
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
            <select name="userrole" >
                <option value="1">Author</option>
                <!--option value="0">Moderator</option-->
                <option value="0">Admin</option>
            </select>

            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Add User</button>
         </form>
    </div>
</section>


