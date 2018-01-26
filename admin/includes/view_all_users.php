<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="2">Change Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];

                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";

                // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                // $select_post_id_query = mysqli_query($connection, $query);
                // while($row = mysqli_fetch_assoc($select_post_id_query)) {
                //     $post_id = $row['post_id'];
                //     $post_title = $row['post_title'];

                //     echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                // }

                echo "<td><a href='users.php?changetoadmin={$user_id}'>Make admin</a></td>";
                echo "<td><a href='users.php?changetosub={$user_id}'>Make subscriber</a></td>";
                echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php
    if(isset($_GET['changetoadmin'])) {
        $user_id = $_GET['changetoadmin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
        $change_role_query = mysqli_query($connection, $query);

        header("Location: users.php");
    }

    if(isset($_GET['changetosub'])) {
        $user_id = $_GET['changetosub'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
        $change_role_query = mysqli_query($connection, $query);

        header("Location: users.php");
    }

    if(isset($_GET['delete'])) {
        $user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = {$user_id} ";
        $delete_query = mysqli_query($connection, $query);

        header("Location: users.php");
    }
?>