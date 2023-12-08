<?php 
    require 'partials/header.php';

    //Fetch users except cuurent admin
    $currentAdminID = $_SESSION['user_id'];

    $query =  "SELECT * FROM tb_users WHERE  NOT id='$currentAdminID'";
    $users = mysqli_query($connection, $query);

?>


<section class="dashboard">

        <?php if(isset($_SESSION['add-user-success'])): ?> <!--Shows if add user was sccessfull-->
            <div class="alert_message success container">
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['edit-user-success'])): ?> <!--Shows if edit user was sccessfull-->
            <div class="alert_message success container">
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['delete-user-success'])): ?> <!--Shows if deleting user was sccessfull-->
            <div class="alert_message success container">
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['edit-user'])): ?> <!--Shows if edit user was Unsccessfull-->
            <div class="alert_message error container">
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['delete-user'])): ?> <!--Shows if deleting user was Unsccessfull-->
            <div class="alert_message error container">
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
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
                    <a href="index.php"><i class="uil uil-postcard"></i>
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
                    <a href="manage-users.php" class="active"><i class="uil uil-users-alt"></i>
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
            <h2>Manage Users</h2>

            <?php if(mysqli_num_rows($users) > 0) : ?>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Privilege</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($user = mysqli_fetch_assoc($users)) : ?>
                            <tr>
                                <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                                <td><?= "{$user['username']}"?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?=$user['id']?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?=$user['id']?>" class="btn sm danger">Delete</a></td>
                                <td>
                                    <?php if($user['is_admin']== 1):?>
                                        Admin
                                    <?php elseif($user['is_admin']== 0):?>
                                        Author
                                    <?php endif?>
                                </td>
                            </tr>
                        <?php endwhile?>

                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert_message error"> No Users found<div>
            <?php endif ?>
        </main>
    </div>
</section>


<?php 
    require '../partials/footer.php';
?>