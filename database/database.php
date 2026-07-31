<?php

$host       = getenv('DB_HOST') ?: "db";
$username   = getenv('DB_USER') ?: "admin";
$password   = getenv('DB_PASSWORD') ?: "";
$dbname     = getenv('DB_NAME') ?: "codebyte";

$REDIS_HOST = getenv('REDIS_HOST') ?: "redis";
$REDIS_PORT = (int)(getenv('REDIS_PORT') ?: 6379); 

try {
    $conn = new mysqli($host, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {
    die("MySQL Connection failed: " . $e->getMessage());
} catch (Exception $e) {
    die("General Connection error: " . $e->getMessage());
}

$redis = new Redis();
try {
    $redis->connect($REDIS_HOST, $REDIS_PORT);
} catch (Exception $e) {
    $redis = null; 
}
?>

