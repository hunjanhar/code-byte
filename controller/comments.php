<?php
require "../middleware/session_verify.php";
require "../database/database.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $comment_description = $_POST['comment_description'];
    $comment_description = str_replace('<','&lt;', $comment_description);
    $comment_description = str_replace('>','&gt;', $comment_description);
    $comment_description = str_replace("\"",'&quot;', $comment_description);
    $comment_description = str_replace("'",'&apos;', $comment_description);
    $thread_id = $_GET['id'];
    $register_id = $_SESSION['id'];
    $create_comment = "INSERT INTO `comment` (`comment_id`, `comment_description`, `thread_id`, `register_id`, `created_at`) VALUES (NULL, '$comment_description', '$thread_id', '$register_id', current_timestamp());";
    $createdcomment = $conn->query($create_comment);
    header("location: ../comments.php?id=$thread_id");
    
}
?>