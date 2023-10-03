<?php
 require 'config.php'; 
    function readSearch(){
    
        
        if(isset($_POST['submitBtn'])){
                $GLOBALS['start'] = $_POST["startPoint"];
                $GLOBALS['end'] = $_POST["endPoint"];
            return true;
           } 
        
        return false;
        }

    function checkRoute(){
        global $conn, $start, $end;
        $sql = "SELECT routeNo, routeStart, routeEnd, cities FROM route";
        $result = $conn->query($sql);
    
        
        if($result->num_rows > 0){
            
            while($row = $result->fetch_assoc()) {
                $no = $row["routeNo"];
                $cities = $row["cities"];
                $dbrouteStart = $row["routeStart"];
                $dbrouteEnd = $row["routeEnd"];
                
                
                $arrayCity = unserialize($cities);
                $arrayLength = count($arrayCity);
                
                for($i=0; $i < $arrayLength; $i++ ){
                    if($start == $arrayCity[$i] ){
                        for($j=0; $j < $arrayLength; $j++) {
                            if($end == $arrayCity[$j]) {
                                $GLOBALS['routeNo'] = $no;
                                $GLOBALS['routeStart'] = $dbrouteStart;
                                $GLOBALS['routeEnd'] = $dbrouteEnd;
                                
                                $sql = "UPDATE tempSearch SET searchRouteNo = '$no', tempStart = '$start', tempEnd = '$end', routeName = '$dbrouteStart - $dbrouteEnd' WHERE keyNo = 1";
                                    if($conn->query($sql)){
                                        return true;

                                    } else {
                                        echo "error: ".$conn->error;
                                    }
                                    $conn->close();
                                
                                
                            }
                        }
                    }
                    
                } 
                
                
            } 
    } 
        
        $conn->close();
        return false;
    }

    

    
if(readSearch()){
    if(checkRoute()){
        include("../html/index.html");
    } else {
        echo "<script> alert('Route Unavailable') </script>";
        include ("../html/index.html");
       // $errorMsg = "Rout Unavailable";
    }
}


?>