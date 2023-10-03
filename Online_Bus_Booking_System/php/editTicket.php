<?php
    require "config2.php";


    $ID = $_GET["ID"];
    $date = $_GET["date"];
    $pick = $_GET["pick"];
    $drop = $_GET["drop"];

    $sql = "UPDATE tickets SET date='$date', startPoint = '$pick', endPoint = '$drop' WHERE ID = '$ID'";
    
    if($conn->query($sql) && $conn->query($sql2)){
            echo "<script> alert('Ticket has updated') </script>";
            
        } else {
            echo "error: ".$conn->error;
        }
        $conn->close();
        
?>