<?php 
    require 'partials/header.php';
?>


<section class="form_section">
    <div class="container form_section-container">
        <h2>Edit Post</h2>
        <form action="" enctype="multipart/form-data" >
            <input type="text" placeholder="Title">
            <select >
                <option value="1">Travel</option>
                <option value="">Art</option>
                <option value="">Science & Technology</option>
                <option value="">Sample1</option>
                <option value="">Sample2</option>
                <option value="">Sample3</option>
            </select>
            <textarea rows="10" placeholder="Body"></textarea>
            <div class="form_control inline">
                <label for="is_featured">Featured</label>
                <input type="checkbox" id="is_featured" checked>
            </div>
            <div class="form_control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" id="thumbnail">
            </div>
            <button type="submit" class="btn">Update Post</button>
         </form>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>