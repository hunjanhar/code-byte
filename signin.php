<!-- start header -->
<?php
$pageTitle = "SignIn";
include "./components/header.php";
if (isset($_GET['exist']) == 'true') {
    echo '<div class="alert" role="alert" style="background-color:#1a2e35;color:#FFFFFF;border-radius:0%;">
  The Email is used already Registed !!!
</div>';
} elseif (isset($_GET['pass']) == 'false') {
    echo '<div class="alert" role="alert" style="background-color:#1a2e35;color:#FFFFFF;border-radius:0%;">
  The Password and Confirm Password is Incorrect !!!
</div>';
}elseif (isset($_GET['reg']) == 'false') {
    echo '<div class="alert" role="alert" style="background-color:#1a2e35;color:#FFFFFF;border-radius:0%;">
  Their is No User for this Email, Please  SignIn first !!! 
</div>';
}
?>
<!-- end header -->

<!-- start main-section -->
<section class="freelance_section">
    <div id="accordion">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                        <div class="heading_container mb-3 mt-3">
                            <h2>
                                Sign In
                            </h2>
                        </div>
                        <form method="post" action="./controller/signin.php" class="mr-2 ml-2">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" class="form-control" id="Username" placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Confirm Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Confirm Password" name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3 mt-3">Sign in</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mb-3">
                    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="img-box">
                            <img src="./static/images/experience-img.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end main-section -->

<!-- start Footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->