<?php

require 'config.php';


function user(){
    global $conn;
    
    $sql = "SELECT email FROM tempsearch WHERE keyNo = 1;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $GLOBALS ["user"] = $row["email"];
     
        

    }


    function insertNewData() { 
        global $conn, $user;
        
                $firstName = $_POST["firstname"];
                $lastName = $_POST["lastname"];
                $email = $_POST["email"];
                $mobileNo = $_POST["phone"];
        
        
        $sql = "UPDATE userDetails SET firstName = '$firstName', lastName = '$lastName', email = '$email', mobileNo = '$mobileNo' WHERE email = '$user'";
        
        $sql2 = "UPDATE tempsearch SET email = '$email' WHERE keyNo = 1";
        
        if($conn->query($sql) && $conn->query($sql2)){
            return true;
        } else {
            echo "error: ".$conn->error;
        }
        $conn->close();
        return false;
    }
        
    
 user();   
function updateData(){
    global $conn, $user;
    if(insertNewData()){
       user();  
    $sql = "SELECT email, password, firstName, lastName, mobileNo FROM userdetails WHERE email = '$user' ";
        
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
        
            $dbEmail = $row["email"];
            $dbName = $row["firstName"]." ".$row["lastName"];
            $dbMobile = $row["mobileNo"];
            
            
            $GLOBALS['name'] = $dbName;
            $GLOBALS['email'] = $dbEmail;
            $GLOBALS['mobile'] = $dbMobile;
            return true;
    }else {
    echo "<script> alert('fail') </script>";
}
    
   return false;     
} 



function loadPage(){
    global $name, $email, $mobile;
    if(updateData()){
        include("../html/userProfile.html");
    } else {
        echo "<script> alert('fail') </script>";
    }
}

updateData();
loadPage();

    
?>
