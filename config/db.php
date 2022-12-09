<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'secret');
define('DB_NAME', 'lecture_php');

// CREATE DATABASE
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


// CHECK CONNECTION
{
    if($conn->connect_error){
        die ("conection error".$conn->connect_error);
    } 
 echo "conneted already";
}
?>