<?php
require "../database/database.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $username = str_replace('<','&lt;', $username);
    $username = str_replace('>','&gt;', $username);
    $username = str_replace("\"",'&quot;', $username);
    $username = str_replace("'",'&apos;', $username);
    //echo $username .''.$email.''.$password.''.$confirm_password;
    if($password == $confirm_password){
        $email_exist = "SELECT * FROM `registration` WHERE email = '$email'; ";
        $result = mysqli_query($conn, $email_exist);
        if($result->num_rows > 0){
            header("location: ../signin.php?exist=true");
        }else{
            $hash_password = password_hash($confirm_password, PASSWORD_DEFAULT);
            $create_user = "INSERT INTO `registration` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$hash_password');";
            mysqli_query($conn, $create_user);
            header("location: ../login.php");
        }
    }
    else{
        header("location: ../signin.php?pass=false");
    }
}
?>