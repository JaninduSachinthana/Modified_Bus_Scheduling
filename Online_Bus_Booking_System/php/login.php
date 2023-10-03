<?php
    require 'config.php';

    function validateLogin() {
        global $conn;
        $email = $conn->real_escape_string($_POST["email"]);
        $pass = $conn->real_escape_string($_POST["pwd"]);

        $sql = "SELECT email, password, firstName, lastName, mobileNo FROM userdetails WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $pass);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $dbEmail = $row["email"];
                    $dbPass = $row["password"];
                    $dbName = $row["firstName"]." ".$row["lastName"];
                    $dbMobile = $row["mobileNo"];
                    
                    if($email == $dbEmail && $pass == $dbPass){
                    //   echo "<script> alert('Login Success') </script>";
                        $GLOBALS['name'] = $dbName;
                        $GLOBALS['email'] = $dbEmail;
                        $GLOBALS['mobile'] = $dbMobile;
                        
                        return true;
                    }
                }
            }        
        }
    }



function loadPage(){
    global $name, $email, $mobile;
    if(validateLogin() && tempData()){
        include("../html/userProfile.html");
    } else {
        echo "<script> alert('Login failed') </script>";
            }
}


function tempData(){
    global $conn, $email;
    $sql = "UPDATE tempsearch SET email = '$email' WHERE keyNo = 1";
    
    if($conn->query($sql)){
        echo "<script> alert('ff') </script>";
        return true;
    } else {
        echo "<script> alert('failed') </script>";
        
    }
    $conn->close();
    return false;
}

loadPage();
    
?>