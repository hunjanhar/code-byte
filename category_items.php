<!-- start header -->
<?php
$pageTitle = "Category";
include "./components/header.php";
?>
<!-- end header -->

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

<!-- start footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->