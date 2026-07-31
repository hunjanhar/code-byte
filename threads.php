<!-- start header -->
<?php
require "./database/database.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $list = "SELECT * FROM `category` WHERE id = '$id'; ";
    $items = mysqli_query($conn, $list);
    foreach ($items as $item) {
        $pageTitle = $item['heading'];
    }
}
include "./components/header.php";
?>
<!-- end header -->

<!-- start main-section -->
<section class="freelance_section mt-5 mb-5">
    <div id="accordion">
        <div class="container-fluid">
            <div class="row">
                <?php
                require "./database/database.php";
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $list = "SELECT * FROM `category` WHERE id = '$id'; ";
                    $items = mysqli_query($conn, $list);
                    foreach ($items as $item) {
                        echo '<div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                        <div class="heading_container mb-3 mt-3">
                            <h2>
                            ' . $item['heading'] . '
                            </h2>
                        </div>
                        <div>
                            <p>
                            ' . $item['description'] . '
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="img-box ml-5">
                            <img src="./static/images/' . $item['image'] . '" alt="" style="height: 350px;width: 350px;">
                        </div>
                    </div>
                </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section class="layout_padding">
    <div class="container">
        <div class="heading_container mb-3">
            <h2>
                create a thread
            </h2>
        </div>
        <div class="container">
            <?php
            echo '<form method="post" action="./controller/threads.php?id=' . $_GET['id'] . '">';
            ?>
            <div class="form-group">
                <label for="text">Heading</label>
                <input type="text" class="form-control" id="text" aria-describedby="emailHelp" placeholder="Enter heading" name="thread_name" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description" name="thread_description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>

<div class="container">
    <div class="heading_container mb-3">
        <h2>
            user threads
        </h2>
    </div>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        require "./database/database.php";
        
        $cacheKey = "threads_cat_" . $id;
        $threadItems = [];
        $fromCache = false;

        if ($redis) {
            $cachedData = $redis->get($cacheKey);
            if ($cachedData) {
                $threadItems = json_decode($cachedData, true);
                $fromCache = true;
            }
        }

        if (!$fromCache) {
            $threadList = "SELECT * FROM `thread` INNER JOIN registration on thread.register_id = registration.id Where thread.category_id = '$id'";
            $result = $conn->query($threadList);
            
            if ($result && $result->num_rows > 0) {
                $threadItems = $result->fetch_all(MYSQLI_ASSOC);
                
                if ($redis) {
                    $redis->setex($cacheKey, 120, json_encode($threadItems));
                }
            }
        }

        if (count($threadItems) > 0) {
            foreach ($threadItems as $item) {
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
        <a style="color:black;font-size:1.5rem;" href=" comments.php?id=' . $item['thread_id'] . '&cat=' . $item['category_id'] . ' " >
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
                There is No Threads !!!
            </div>
                ';
        }
    }
    ?>
</div>
</div>
<!-- end main-section -->

<!-- start Footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->