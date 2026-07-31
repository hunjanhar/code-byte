<!-- start header -->
<?php
$pageTitle = "LogIn";
include "./components/header.php";
if (isset($_GET['auth']) == 'false') {
    echo '<div class="alert" role="alert" style="background-color:#1a2e35;color:#FFFFFF;border-radius:0%;">
  Please Login First !!!
</div>';
} elseif (isset($_GET['pass']) == 'false') {
    echo '<div class="alert" role="alert" style="background-color:#1a2e35;color:#FFFFFF;border-radius:0%;">
  The Password is Incorrect !!!
</div>';
}
?>
<!-- end header -->

<!-- start main-section -->
<section class="freelance_section mt-5 mb-5">
    <div id="accordion">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                        <div class="heading_container mb-3 mt-3">
                            <h2>
                                Log In
                            </h2>
                        </div>
                        <form action="./controller/login.php" method="post" class="mr-2 ml-2">
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3 mt-3">Log in</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="img-box">
                            <img src="./static/images/freelance-img.jpg" alt="">
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