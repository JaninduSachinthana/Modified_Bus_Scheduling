<?php
    require 'config.php';
    
    function writData(){
        global $conn;
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $mobileNo = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["pwd"];
        
        $sql = "INSERT INTO userdetails (firstName, lastName, mobileNo, email, password) VALUES('$firstName', '$lastName', '$mobileNo', '$email', '$password')";
        
        if($conn->query($sql)){
            echo " <script> alert('Registered') </script>";
            include("../html/register.html");
        } else {
            echo "error: ".$conn->error;
        }
        $conn->close();
    }


writData();
?>