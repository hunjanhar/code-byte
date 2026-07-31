<!-- start header -->
<?php
$pageTitle = "Contact Us";
include "./components/header.php";
?>
<!-- end header -->

<!-- start contact section -->
<section class="freelance_section mt-5 mb-5">
    <div id="accordion">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                        <div class="heading_container mb-3 mt-3">
                            <h2>
                                contact us
                            </h2>
                        </div>
                        <form action="./controller/contact.php" method="post" class="mr-2 ml-2">
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Enter Feedback</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
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
<!-- end contact section -->

<!-- start Footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->