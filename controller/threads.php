
<?php
require "../database/database.php";
require "../middleware/session_verify.php";
echo 'hello';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $thread_name = $_POST['thread_name'];
    $thread_description = $_POST['thread_description'];
    $category_id = $_GET['id'];
    $register_id = $_SESSION['id'];
    $thread_name = str_replace('<','&lt;', $thread_name);
    $thread_name = str_replace('>','&gt;', $thread_name);
    $thread_description = str_replace('<','&lt;', $thread_description);
    $thread_description = str_replace('>','&gt;', $thread_description);
    $thread_name = str_replace("\"",'&quot;', $thread_name);
    $thread_name = str_replace("'",'&apos;', $thread_name);
    $thread_description = str_replace("\"",'&quot;', $thread_description);
    $thread_description = str_replace("'",'&apos;', $thread_description);
    //echo $thread_name.''.$thread_description.''.$category_id. ''.$register_id.'';
    $create_thread = "INSERT INTO `thread` (`thread_id`, `thread_name`, `thread_description`, `category_id`, `register_id`, `created_at`) VALUES (NULL, '$thread_name', '$thread_description', '$category_id', '$register_id', current_timestamp());";
    $created_thread = mysqli_query($conn, $create_thread);
    header("location: ../threads.php?id=$category_id");

}

?>