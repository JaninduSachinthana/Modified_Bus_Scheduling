<?php 
    require 'config.php';

    
    $sql = "SELECT email FROM tempsearch WHERE keyNo = 1;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $GLOBALS ["user"] = $row["email"];
     
        

?>