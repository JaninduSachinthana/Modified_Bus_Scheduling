<?php 
    require"config.php";
   
    $username = isset($_GET["username"]) ? $_GET["username"] : "";
    $email = isset($_GET["email"]) ? $_GET["email"] : "";
    $message = isset($_GET["message"]) ? $_GET["message"] : "";

    $sql = "INSERT INTO feedbacks(username,email,message) VALUES('$username','$email','$message')";
    if($conn->query($sql))
    {
        echo "<script> alert('" . htmlspecialchars('Feedback successfully sent to the system') . "')</script>";
    }
    else
    {
        echo "error: ".$conn->error;
    }

    $conn->close();
?>~