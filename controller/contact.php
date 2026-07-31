<?php
require "../middleware/session_verify.php";
require "../database/database.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $feeback = $_POST['feedback'];
    $feeback = str_replace('<','&lt;', $feeback);
    $feeback = str_replace('>','&gt;', $feeback);
    $feeback = str_replace("\"",'&quot;', $feeback);
    $feeback = str_replace("'",'&apos;', $feeback);
    $registed_id = $_SESSION['id'];
    $created_query = "INSERT INTO `contactus` (`contact_id`, `email`, `feedback`, `registed_id`) VALUES (NULL, '$email', '$feeback', '$registed_id');";
    $conn->query($created_query);
    header("location: ../index.php");
    exit();
}
?>