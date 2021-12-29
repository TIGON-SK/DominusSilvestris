<?php
//Start Session
session_start();

//php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Create Constants
define('BASEURL', 'http://localhost:81/Web/DominusSilvestris/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'dominus_silvestris');
define('MAX_SIZE',3000000);

try {
    $conn = new PDO("mysql:host=".LOCALHOST.";dbname=".DB_NAME,
        DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
}
/*
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database


$connection = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected successfully";
}*/
function show_404()
{
    header('HTTP/1.0 404 Not Found', true, 404);
    include_once("errors/404.php");
    die();
}
?>