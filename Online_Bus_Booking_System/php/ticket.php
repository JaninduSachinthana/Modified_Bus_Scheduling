<?php 


    require 'config.php';
    


$testName = array();


function loadTickets(){
    global $conn, $testName;
    $sql = "SELECT startPoint, endPoint, email FROM tickets ";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    
    if($result->num_rows > 0){
            $i = 0;
        
            
            while($row = $result->fetch_assoc()) {
                 
                $dbEmail = $row["email"];
                $dbName = $row["startPoint"]." - ".$row["endPoint"];
                
                    
                    $testName[$i] = $dbName;
                echo "<script> alert($testName[$i]) </script>";
                    $i++;
                              
                    
                    
                }        
                return true;
            }  else {
        return false;
    }
            
        
    }

/*

function test2(){
    if(loadTickets()){
        global $testName;
    echo "<script> alert('step 4') </script>";
    $y = count($testName);
   for($i = 0; $i < $y; $i++){
        echo "<script> alert('$testName[$i]') </script>";
    }  
    } else {
        echo "fail";
    }
    
}

*/

if(loadTickets()){
    global $testname;
    include ("../html/ticket_bucket.html");
}



?>