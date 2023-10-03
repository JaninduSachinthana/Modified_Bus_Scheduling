<?php 
    require 'config.php';
    
    function updateData() {
        
        global $conn;
        
        $type = $_POST["type"];
        $qty = $_POST["qty"];
        $date = $_POST["date"];
        
        $sql = "UPDATE tempSearch SET type = '$type', qty = '$qty', date = '$date' WHERE keyNo = 1";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if($conn->query($sql)){
            echo "<script> alert('success') </script>";
            
            $GLOBALS["pricePerTicket"] = 100;
            $GLOBALS["noOfPassengers"] = $qty;
            $GLOBALS["totAmount"] = 100 * $qty;
            return true;

        } else {
            echo "error: ".$conn->error;
        }
        $conn->close(); 
        
    }

    function loadPage(){
        global $pricePerTicket, $noOfPassengers, $totAmount;
        
        if(updateData()){
           
            
            include("../html/book.html");
        } else {
            echo "<script> alert('Error. Please try again') </script>";
        include("../html/index.html");
        }
    }

loadPage();
?>