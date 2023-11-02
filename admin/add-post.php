<?php 
    require 'partials/header.php';
?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Create Post</h2>
        <div class="alert_message error">
            <p>This is a Error meassage</p>
        </div>
        <form action="" enctype="multipart/form-data" >
            <input type="text" placeholder="Title">
            <select >
                <option value="1">Tech</option>
                <option value="">Art</option>
                <option value="">Food</option>
                <option value="">Wild Life</option>
                <option value="">Self Growth</option>
                <option value="">Music</option>
            </select>
            <textarea rows="10" placeholder="Body"></textarea>
            <div class="form_control inline">
                <label for="is_featured">Featured</label>
                <input type="checkbox" id="is_featured" checked>
            </div>
            <div class="form_control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" id="thumbnail">
            </div>
            <button type="submit" class="btn">Post</button>
         </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>