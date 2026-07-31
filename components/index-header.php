<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>CodeByte</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="./static/css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./static/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="./static/css/responsive.css" rel="stylesheet" />
  <title>CodeByte</title>
</head>

<body>
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img src="./static/images/logo.png" alt="" />
            <span>
              <b>CODE</b><code><small>Byte</small></code>
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="team.php">Team Leaders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category_items.php"> Category</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="contact.php"> Contact Us</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
              <input class="form-control mr-sm-2 mb-1" type="search" placeholder="Search" aria-label="Search" style="width: 150px;" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            </form>
            
              <?php
              session_start();
              if (isset($_SESSION['email'])) {
                echo '<div>
              <span class="nav-item active mr-2" style="color:white;">
                Hello, '. $_SESSION['username'].'
              </span>
              <a href="./controller/logout.php">
                <div class="btn btn-success mr-2">Logout</div>
              </a>
            </div>';
              } else {
                echo '<div><a href="login.php">
                <div class="btn btn-success mr-2">LogIn</div>
              </a>
              <a href="signin.php">
                <div class="btn btn-success mr-2">SignIn</div>
              </a></div>';
              }
              ?>
            
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- slider section -->
    <section class="slider_section ">
      <div class="carousel_btn-container">
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <h1>
                      Join the<br>
                      Conversation<br>

                    </h1>
                    <p>
                      Welcome to our forum, where individuals share ideas and learn from each other. Join our community to connect with like-minded people and start meaningful conversations.
                    </p>

                  </div>
                </div>
                <div class="offset-md-1 col-md-4 img-container">
                  <div class="img-box">
                    <img src="./static/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <h1>
                      Share Your <br>
                      Ideas <br>

                    </h1>
                    <p>
                      Share your thoughts and expertise with our community, and get feedback from others. Our platform is the perfect place to showcase your knowledge and grow your network.
                    </p>

                  </div>
                </div>
                <div class="offset-md-1 col-md-4 img-container">
                  <div class="img-box">
                    <img src="./static/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <h1>
                      Discover New <br>
                      Perspectives <br>

                    </h1>
                    <p>
                      Explore our forum to discover new ideas and insights from a diverse range of topics. Learn from others, share your own experiences, and grow with our community.
                    </p>

                  </div>
                </div>
                <div class="offset-md-1 col-md-4 img-container">
                  <div class="img-box">
                    <img src="./static/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
  </div>
  <!-- end slider section -->