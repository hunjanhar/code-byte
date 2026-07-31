<!-- start header -->
<?php
require "./database/database.php";
if (isset($_GET['cat'])) {
    $id = $_GET['cat'];
    $list = "SELECT * FROM `category` WHERE id = '$id'; ";
    $items = mysqli_query($conn, $list);
    foreach ($items as $item) {
        $pageTitle = $item['heading'];
    }
}
include "./components/header.php";
?>
<!-- end header -->

<!-- start comment section -->
<section class="category_section layout_padding">
    <div class="container">
        <?php
        $thread_id = $_GET["id"];
        include "./database/database.php";
        $thread = "SELECT * FROM `thread` JOIN registration on thread.register_id = registration.id where thread.thread_id = $thread_id; ";
        $userthread = $conn->query($thread);
        foreach ($userthread as $key) {
            echo '<div class="heading_container">
            <img class="mr-3" src="./static/images/user.png" alt="" height="50" width="50">
            <h2>
                ' . $key['thread_name'] . '
            </h2>
        </div>
        <div class="category_container" style="font-size:18px;">
            ' . $key['thread_description'] . '
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <big class="mr-2"><b>' . $key['username'] . '</b></big><small>' . $key['email'] . '</small>
            </div>
            <div>
                ' . substr($key['created_at'], 0, 10) . '
            </div>
        </div>';
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
                comments
            </h2>
        </div>
        <div class="container">
            <?php
            echo '<form method="post" action="./controller/comments.php?id=' . $_GET['id'] . '">';
            ?>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Comment" name="comment_description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>


<div class="container">
    <div class="heading_container mb-3">
        <h2>
            user comments
        </h2>
    </div>
    <?php
    include "./database/database.php";
    $thread_id = $_GET["id"];
    
    $cacheKey = "comments_thread_" . $thread_id;
    $commentItems = [];
    $fromCache = false;

    if ($redis) {
        $cachedData = $redis->get($cacheKey);
        if ($cachedData) {
            $commentItems = json_decode($cachedData, true);
            $fromCache = true;
        }
    }

    if (!$fromCache) {
        $commentsList = "SELECT * FROM `comment` JOIN registration on comment.register_id = registration.id where comment.thread_id = $thread_id;";
        $comments = $conn->query($commentsList);
        
        if ($comments && $comments->num_rows > 0) {
            $commentItems = $comments->fetch_all(MYSQLI_ASSOC);

            if ($redis) {
                $redis->setex($cacheKey, 60, json_encode($commentItems));
            }
        }
    }

    if (count($commentItems) > 0) {
        foreach ($commentItems as $key) {
            echo '<div class="container mb-3 pt-2 pb-2" style="background-color: #1cbbb4;border-radius:5px;">
        <div class="row no-gutters align-items-center">
            <div class="col-auto">
                <img src="./static/images/user.png" alt="" height="50" width="50">
            </div>
            <div class="col ml-2">
                <div>
                    ' . htmlspecialchars($key['username']) . '
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        ' . htmlspecialchars($key['email']) . '
                    </div>
                    <div>
                       ' . substr($key['created_at'], 0, 10) . '
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-2">
        <h5>' . htmlspecialchars($key['comment_description']) . '</h5>
        </div>
        <div>
        </div>
    </div>';
        }
    } else {
        echo '
        <div class="alert alert-dark" role="alert">
            There is No Comments !!!
        </div>
            ';
    }
    ?>

</div>
</div>
<!-- end comment section -->

<!-- start Footer -->
<?php
include "./components/footer.php";
?>
<!-- end footer -->