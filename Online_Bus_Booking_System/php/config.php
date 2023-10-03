<?php
$servername = "localhost";
$username = "root";
$password = "";

//create connection
$conn = new mysqli($servername,$username,$password,"ebooking");
if($conn->connect_error){
    die("$connection Failed: ".$conn->connect_error);
} else {
 //  echo "Connect Successfully";
}