<?php
$pageTitle = 'CodeByte'; 
include "./components/index-header.php";
?>

<!-- experience section -->
<section class="experience_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="img-box">
          <img src="./static/images/experience-img.jpg" alt="">
        </div>
      </div>
      <div class="col-md-7">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Smooth Onboarding Experience
            </h2>
          </div>
          <p>
            Our platform ensures a seamless onboarding process, allowing users to quickly get started with our features and tools. With a user-friendly interface and intuitive design, new users can easily navigate and find what they need. This results in a higher engagement rate and a better overall experience.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- end experience section -->

<!-- category section -->
<section class="category_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        Category
      </h2>
    </div>
    <div class="category_container">
      <?php
      require "./database/database.php";
      
      $cacheKey = "homepage_categories";
      $categories = [];
      $fromCache = false;

      if ($redis) {
        $cachedData = $redis->get($cacheKey);
        if ($cachedData) {
          $categories = json_decode($cachedData, true);
          $fromCache = true;
        }
      }

      if (!$fromCache) {
        $itemsList = "SELECT * FROM category;";
        $items = mysqli_query($conn, $itemsList);
        
        if ($items && $items->num_rows > 0) {
          $categories = mysqli_fetch_all($items, MYSQLI_ASSOC);

          if ($redis) {
            $redis->setex($cacheKey, 3600, json_encode($categories));
          }
        }
      }

      if (count($categories) > 0) {
        foreach ($categories as $item) {
          echo '<div class="box">
          <div class="img-box mb-3">
          <a href="threads.php?id=' . $item['id'] . '">
            <img src="./static/images/' . htmlspecialchars($item['image']) . '" alt="" height="130" width="130">
            </a>
          </div>
          <div class="detail-box">
            <a href="threads.php?id=' . $item['id'] . '" style="color:white;"><h5>
              ' . htmlspecialchars($item['heading']) . '
            </h5></a>
          </div>
        </div>';
        }
      }
      ?>
    </div>
  </div>
</section>
<!-- end category section -->

<!-- about section -->
<section class="about_section layout_padding">
  <div class="container">
    <div class="row">
      
    </div>
    <div class="detail-box">
      <h2>
        About <b>CODE</b><code><small style="color:darkpink">Byte</small></code> Company
      </h2>
      <p>
        Founded on the principles of innovation and community building, our company creates a platform for users to connect, share, and grow together. With a team of passionate individuals, we strive to provide a seamless experience. Our goal is to empower users to build meaningful relationships and collaborate on projects.
      </p>
    </div>
  </div>
</section>
<!-- end about section -->

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
<!-- end teamleaders section -->

<!-- client section -->
<section class="client_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-10 mx-auto">
        <div class="heading_container">
          <h2>
            Testimonial
          </h2>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="detail-box">
                <h4>
                  Forum Feedback
                </h4>
                <p>
                  I was blown away by the quality of discussions on this forum. The community is so engaged and helpful!" - John D.
                </p>
                <img src="images/quote.png" alt="">
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail-box">
                <h4>
                  Valuable Insights
                </h4>
                <p>
                  I've learned so much from the experienced members on this forum. The advice and guidance I've received have been invaluable to my project." - Emily W.
                </p>
                <img src="images/quote.png" alt="">
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail-box">
                <h4>
                  A Supportive Community
                </h4>
                <p>
                  I was struggling with a problem and the community came together to help me solve it. The support and encouragement I received were amazing!" - David K.
                </p>
                <img src="images/quote.png" alt="">
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end client section -->

<!-- start footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->