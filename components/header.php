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

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="./static/css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./static/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="./static/css/responsive.css" rel="stylesheet" />
  <title><?php echo isset($pageTitle) ? $pageTitle : 'CodeByte'; ?></title>
</head>

<body class="sub_page">
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
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="team.php">Team Leaders </a>
              </li>
              <li class="nav-item active">
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
                Hello, ' . $_SESSION['username'] . '
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
  </div>