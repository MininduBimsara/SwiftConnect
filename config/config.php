<?php

$servername ="localhost";
$username = "root";
$password="";
$dbname="swiftconnect";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    echo "Error in connecting to database!";
}
?>