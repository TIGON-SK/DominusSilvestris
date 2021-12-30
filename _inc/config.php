<?php
//CONFIG FILE

//Start Session
//session_start();

//php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Create Constants
const BASEURL = 'http://localhost:81/Web/DominusSilvestris/';
const LOCALHOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_NAME = 'dominus_silvestris';
const MAX_SIZE = 3000000;

try {
    $conn = new PDO("mysql:host=".LOCALHOST.";dbname=".DB_NAME,
        DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    out( "Connection failed : ". $e->getMessage());
}
include_once "functions.php";