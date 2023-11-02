<?php 
    require 'partials/header.php';
?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Add User</h2>
        <div class="alert_message error">
            <p>This is a Error meassage</p>
        </div>
        <form action="" enctype="multipart/form-data" >
            <input type="text" placeholder="First name">
            <input type="text" placeholder="Last name">
            <input type="text" placeholder="User name">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Create Password">
            <input type="password" placeholder="Confirm Password">
            <select >
                <option value="1">Author</option>
                <option value="0">Moderator</option>
                <option value="0">Admin</option>
            </select>

            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" id="avatar">
            </div>
            <button type="submit" class="btn">Add User</button>
         </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>