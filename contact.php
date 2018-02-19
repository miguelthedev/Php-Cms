<?php  include "includes/header.php"; ?>

<!-- Navigation -->  
<?php  include "includes/navigation.php"; ?>

<?php
    if(isset($_POST['submit'])) {

        $to = "msanchez.anaheim@gmail.com";

        $header = "From: " . escape($_POST['email']);
        $subject = wordwrap(escape($_POST['subject']), 60);
        $body = $_POST['body'];

        mail($to, $subject, $body, $header);
    }
?>
    
<!-- Page Content -->
<div class="container">
    
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Type in your message"></textarea>
                            </div>
                    
                            <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Submit">
                        </form>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<hr>

<?php include "includes/footer.php";?>
