<!-- start header -->
<?php
$pageTitle = "Search";
include "./components/header.php";
?>
<!-- end header -->

<!-- main-section start -->
<div class="container">
    <div class="heading_container mb-3 mt-3">
        <h2>
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                echo "SEARCH FOR '" . htmlspecialchars($search) . "' IS";
            }
            ?>
        </h2>
    </div>
    <?php
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        require "./database/database.php";

        $cleanSearch = strtolower(trim($search));
        $cacheKey = "search_results_" . md5($cleanSearch);
        $searchItems = [];
        $fromCache = false;

        if ($redis) {
            $cachedData = $redis->get($cacheKey);
            if ($cachedData) {
                $searchItems = json_decode($cachedData, true);
                $fromCache = true;
            }
        }

        if (!$fromCache) {
            $safeSearch = $conn->real_escape_string($search);
            $searchList = "SELECT * FROM `thread` JOIN registration ON thread.register_id = registration.id where thread.thread_name LIKE '%$safeSearch%';";
            $result = $conn->query($searchList);
            
            if ($result && $result->num_rows > 0) {
                $searchItems = $result->fetch_all(MYSQLI_ASSOC);

                if ($redis) {
                    $redis->setex($cacheKey, 300, json_encode($searchItems));
                }
            }
        }

        if (count($searchItems) > 0) {
            foreach ($searchItems as $item) {
                echo '<div class="container mb-3 pt-2 pb-2" style="background-color: #1cbbb4;border-radius:5px;">
        <div class="row no-gutters align-items-center">
            <div class="col-auto">
                <img src="./static/images/user.png" alt="" height="50" width="50">
            </div>
            <div class="col ml-2">
                <div>
                    ' . htmlspecialchars($item['username']) . '
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        ' . htmlspecialchars($item['email']) . '
                    </div>
                    <div>
                        ' . substr($item['created_at'], 0, 10) . '
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-2">
        <a style="color:black;font-size:1.5rem;" href="comments.php?id=' . $item['thread_id'] . '" >
            ' . htmlspecialchars($item['thread_name']) . '
        </a>
        <div>';
                if (strlen($item['thread_description']) <= 20) {
                    echo htmlspecialchars($item['thread_description']);
                } else {
                    echo htmlspecialchars(substr($item['thread_description'], 0, 20)) . '...';
                }
                echo '</div></div>
        </div>';
            }
        } else {
            echo '
            <div class="alert alert-dark" role="alert">
                There is No Items similar to ' . htmlspecialchars($_GET['search']) . ' !!!
            </div>
                ';
        }
    }
    ?>
</div>
<!-- end main-session -->

<!-- start Footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->