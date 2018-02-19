<?php include 'includes/admin_header.php'; ?>
<?php
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }

    if(isset($_POST['update_user'])) {
        $username = escape($_POST['username']);
        $user_password = escape($_POST['user_password']);
        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname = escape($_POST['user_lastname']);
        $user_email = escape($_POST['user_email']);
        $user_role = escape($_POST['user_role']);

        // move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$user_password}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE username = '{$username}' ";


        $update_user_query = mysqli_query($connection, $query);

        confirm($update_user_query);

    }
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="post_status">Lastname</label>
                                <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_role">Role</label>
                                <select name="user_role" id="">
                                    <option value="subscriber"><?php echo $user_role; ?></option>
                                    <?php
                                        if($user_role == 'admin') {
                                            echo "<option value='subscriber'>subscriber</option>";
                                        } else {
                                            echo "<option value='admin'>admin</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="user_image">
                            </div> -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="update_user" value="Update Profile">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include 'includes/admin_footer.php'; ?>