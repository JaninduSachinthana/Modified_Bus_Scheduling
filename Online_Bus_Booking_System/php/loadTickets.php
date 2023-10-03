<?php
    require 'config.php';
    require 'readTempValue.php';
    

function insertData() {
    global $conn;
    
$sql = "SELECT email, searchRouteNo, routeName, tempStart, tempEnd, date, qty, type FROM tempsearch WHERE keyNo = 1";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $email = $row["email"];
    $routeNo = $row["searchRouteNo"];
    $routeName = $row["routeName"];
    $start = $row["tempStart"];
    $end = $row["tempEnd"];
    $date = $row["date"];
    $qty = $row["qty"];
    $type = $row["type"];

$sql2 = "INSERT INTO tickets (email, routeNo, routeName, startPoint, endPoint, date, qty, type) VALUES('$email', '$routeNo', '$routeName', '$start', '$end', '$date', '$qty', '$type')";

$result2 = $conn->query($sql);


        if($conn->query($sql2)){
            echo " <script> alert('Order placed') </script>";
            return true;
            
        } else {
            echo "error: ".$conn->error;
        }
        $conn->close();

}

    
;


function loadTickets(){
    global $conn, $user, $testName;
    $sql = "SELECT startPoint, endPoint, email FROM tickets ";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<script> alert('step 1') </script>";
    
    if($result->num_rows > 0){
            $i = 0;
        echo "<script> alert('step 2') </script>";
            
            while($row = $result->fetch_assoc()) {
                
                $dbEmail = $row["email"];
                $dbName = $row["startPoint"]." - ".$row["endPoint"];
                if($user == $dbEmail){
                    echo "<script> alert('array $i.$dbName') </script>";
                    $testName[$i] = $dbName;
                $i++;
                }               
                    
                    
                }        
                return true;
            }  else {
        return false;
    }
            
        
    }
    








/*

function loadPage() {
    if(insertData()){
        loadTickets();
        include("../html/ticket_bucket.html");
    } else {
         echo "<script> alert('fail') </script>";
    }
}

*/




?>