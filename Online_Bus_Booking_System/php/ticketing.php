<?php


    require 'config.php';

    function readSearchRoute(){
        global $conn;
        
        $sql = "SELECT searchRouteNo, tempStart, tempEnd, routeName FROM tempSearch WHERE keyNo = 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $start = $row["tempStart"];
        $end = $row["tempEnd"];
        $route = $row["routeName"];
        $no = $row["searchRouteNo"];
        
        $GLOBALS['startPoint'] = $start;
        $GLOBALS['endPoint'] = $end;
        $GLOBALS['routeName'] = $route;
        $GLOBALS['routeNo'] = $no;
      
        
        
        
        
        return true;
        
    }


   

function loadPage(){
    global $startPoint, $endPoint, $routeName, $routeNo;
    if(readSearchRoute()){
        include("../html/ticket.html");
    } else {
        echo "<script> alert('Error. Please try again') </script>";
        include("../html/index.html");
    }
}

loadPage();
?>