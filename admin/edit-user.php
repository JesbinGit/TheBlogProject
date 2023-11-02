<?php 
    require 'partials/header.php';
?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Change User Info</h2>
        <form action="" enctype="multipart/form-data" >
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="/images/jisoo.jpg">
                </div>
                <div class="post__author">
                    <h5> Username </h5>
                </div>
            </div>
            <input type="text" placeholder="First name">
            <input type="text" placeholder="Last name">
            <select >
                <option value="1">Author</option>
                <option value="0">Moderator</option>
                <option value="0">Admin</option>
            </select>
            <button type="submit" class="btn">Update User Info</button>
         </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>