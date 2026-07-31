<!-- start header  -->
<?php
$pageTitle = "Team Leaders";
include "./components/header.php";
?>
<!-- end header -->

<!-- teamleaders section -->
<section class="freelance_section ">
  <div id="accordion">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Meet Our Team
              </h2>
            </div>
            <div class="tab_container">
              <div class="t-link-box" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div style="margin-right:1rem;">
                  <div style="height: 100px;width:100px;border-radius:50px;overflow:hidden">
                    <img src="./static/images/team-lead1.jpg" height="100" width="100">
                  </div>
                </div>
                <div class="detail-box">
                  <h5>
                    John Lee
                  </h5>
                  <div>
                    CEO - A visionary leader with a passion for innovation and community building.
                  </div>
                </div>
              </div>
              <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div style="margin-right:1rem;">
                  <div style="height: 100px;width:100px;border-radius:50px;overflow:hidden">
                    <img src="./static/images/team-lead2.jpg" height="100" width="100">
                  </div>
                </div>
                <div class="detail-box">
                  <h5>
                    Emily Chen
                  </h5>
                  <div>
                    CTO - A seasoned technologist with expertise in platform development and scalability.
                  </div>
                </div>
              </div>
              <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <div style="margin-right:1rem;">
                  <div style="height: 100px;width:100px;border-radius:50px;overflow:hidden">
                    <img src="./static/images/team-lead3.jpeg" height="100" width="100">
                  </div>
                </div>
                <div class="detail-box">
                  <h5>
                    Michael Kim
                  </h5>
                  <div>
                    Designer - A creative genius with a talent for crafting intuitive and user-friendly interfaces.
                  </div>
                </div>
              </div>
              <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <div style="margin-right:1rem;">
                  <div style="height: 100px;width:100px;border-radius:50px;overflow:hidden">
                    <img src="./static/images/team-lead4.jpg" height="100" width="100">
                  </div>
                </div>
                <div class="detail-box">
                  <h5>
                    Sarah Taylor
                  </h5>
                  <div>
                    Community Manager - A people person with a knack for building and nurturing online communities.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="collapse show"  aria-labelledby="headingOne" data-parent="#accordion">
            <div class="img-box">
              <img src="./static/images/freelance-img.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end teamleader section -->

<!-- start footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->