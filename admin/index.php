<?php 
    require 'partials/header.php';

    //fetch current user's posts
    $curent_user_id = $_SESSION['user_id'];
    $query = "SELECT tb_posts.id, tb_posts.title, tb_posts.is_featured, tb_categories.title AS category FROM tb_posts JOIN tb_categories ON tb_posts.category_id = tb_categories.id WHERE tb_posts.author_id = $curent_user_id ORDER BY tb_posts.id DESC";
    $posts = mysqli_query($connection, $query);

?>


<section class="dashboard">


        <?php if(isset($_SESSION['add-post-success'])) : ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-post-success']; 
                    unset($_SESSION['add-post-success']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['edit-post-success'])) : ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['edit-post-success']; 
                    unset($_SESSION['edit-post-success']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['delete-post-success'])): ?> <!--Shows if deleting post was sccessfull-->
            <div class="alert_message success container">
                <?= $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
                ?>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['delete-post'])): ?> <!--Shows if deleting post was Unsccessfull-->
            <div class="alert_message error container">
                <?= $_SESSION['delete-post'];
                unset($_SESSION['delete-post']);
                ?>
            </div>
        <?php endif ?>

    <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                    <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="active" ><i class="uil uil-postcard"></i>
                    <h5>Manage Posts</h5>
                    </a>
                </li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                    <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php" ><i class="uil uil-users-alt"></i>
                    <h5>Manage Users</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                    <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php" ><i class="uil uil-list-ul"></i>
                    <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>

            <?php if(mysqli_num_rows($posts) > 0) : ?>

                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                                <!--Removed fetch category as it possible to fetch it while fetching the post Data (6:34:00 video timeline if you want to check it)-->
                            <tr>
                                <td><?=$post['title']?>
                                    <?php if($post['is_featured']):?>
                                        <p class="alert_message success container ">Featured</p><!--Remove or beautify this[diffrent css class style in that case] -->
                                    <?php endif ?>
                                </td>
                                <td><?=$post['category']?></td>
                                <td><a href="<?=ROOT_URL?>admin/edit-post.php?id=<?=$post['id']?>" class="btn sm">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure that you want to delete post <?=$post['title']?>?');" href="<?=ROOT_URL?>admin/delete-post.php?id=<?=$post['id']?>" class="btn sm danger">Delete</a></td>
                            </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>
            
            <?php else : ?>
                <div class="alert_message error"> You haven't created a Post yet.<div>
            <?php endif ?>

        </main>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>