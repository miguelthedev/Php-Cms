<?php  include "includes/header.php"; ?>

<!-- Navigation -->  
<?php  include "includes/navigation.php"; ?>

<?php
    
    require 'vendor/autoload.php';

    $options = array(
        'cluster' => 'us2',
        'encrypted' => true
    );

    $pusher = new Pusher\Pusher(
        '0f3175fd3c54c0804876',
        '09515b0dd3f6293758d3',
        '478427',
        $options
    );

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = escape($_POST['username']);
        $email = escape($_POST['email']);
        $password = escape($_POST['password']);

        $error = [
            'username'=> '',
            'email'=> '',
            'password' => ''
        ];

        if(strlen($username) < 4 ) {
            $error['username'] = 'Username must be longer.';
        }

        if($username == '') {
            $error['username'] = 'Username cannot be empty.';
        }

        if(username_exists($username)) {
            $error['username'] = 'Username already exists.';
        }

        if($email == '') {
            $error['email'] = 'Email cannot be empty.';
        }

        if(email_exists($email)) {
            $error['email'] = 'Email already in use.';
        }

        if($password == '') {
            $error['password'] = 'Password cannot be empty.';
        }

        foreach($error as $key => $value) {
            if(empty($value)) {
                unset($error[$key]);
            }
        }

        if(empty($error)) {
            register_user($username, $email, $password);

            $data['message'] = $username . " has succesfully registered.";
            $pusher->trigger('notifications', 'new_user', $data);

            login_user($username, $password);
        }
    }
?>
    
<!-- Page Content -->
<div class="container">
    
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username) ? $username : ''; ?>">
                                <p class="text-danger"><?php echo isset($error['username']) ? $error['username'] : ''; ?></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="youremail@cms.com" autocomplete="on" value="<?php echo isset($email) ? $email : ''; ?>">
                                <p class="text-danger"><?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                <p class="text-danger"><?php echo isset($error['password']) ? $error['password'] : ''; ?></p>
                            </div>
                    
                            <input type="submit" name="register" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                        </form>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<hr>

<?php include "includes/footer.php";?>
