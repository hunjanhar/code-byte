<?php
require "../database/database.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_exist = "SELECT * FROM `registration` WHERE email = '$email'; ";
    $result = mysqli_query($conn, $email_exist);
    if($result->num_rows > 0){
        $rows = mysqli_fetch_array($result);
        foreach($rows as $row){
            if(password_verify($password,$rows['password'])){
                header("location: ../index.php");
                session_start();
                $_SESSION["username"] = $rows["username"];
                $_SESSION["email"] = $rows["email"];
                $_SESSION['id'] = $rows['id'];
                exit();
            }
            else{
                header("location: ../login.php?pass=false");
                exit();
            }
        }
    }else{
        header("location: ../signin.php?reg=false");
    }
}


?>
