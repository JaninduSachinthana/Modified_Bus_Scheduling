
function myFunction() {
    var startPoint = document.getElementById("myForm").elements.namedItem("startPoint").value;
    var endPoint = document.getElementById("myForm").elements.namedItem("endPoint").value;
    
    
    if (startPoint === "Kaduwela" && endPoint === "Malabe") {
        document.getElementById("r1").style.visibility = "visible";
        document.getElementById("route-1").innerHTML = "Route : 177 (Kaduwela - Kollupitiya)";
        document.getElementById("img-route-1").src = "../images/177.jpg";       
    }
    
    
} 


function register(){
    document.getElementById("register").style.display = "block";
    document.getElementById("login").style.display = "none";
}

function login(){
    document.getElementById("register").style.display = "none";
    document.getElementById("login").style.display = "block"
}


function registerSubmit() {
    
    
     var password = document.getElementById("register").elements.namedItem("pwd").value;
    var rePassword = document.getElementById("register").elements.namedItem("repwd").value;
   
   
    if(password == rePassword){
        alert("Success");
    } else {
        alert("fail");
    }  
    
} 

/*
function log() {
    var lmail = document.getElementById("login").elements.namedItem("email").value;
    var lpassword = document.getElementById("login").elements.namedItem("pwd").value;
    
    
} */




/*  
     */




function readRoute() {
    var getNo = document.getElementById("route");
    var routeNo = getNo.textContent;
    
    var getStart = document.getElementById("routeStart");
    var start = getStart.textContent;
    
    var end = document.getElementById("routeEnd").textContent;
    
    var no = parseInt(routeNo);
    document.getElementById("routeImg").src = "../images/route-" + no+ ".jpg";
    
    if(isNaN(no)){
        document.getElementById("routeImg").style.display = "none";
    } else {
        document.getElementById("routeImg").style.display = "block";
        document.getElementById("r1").style.visibility = "visible";
        document.getElementById("route-1").innerHTML = no + "   ("+ start + "-" + end + ")";
    }
    
}

function searchBtn(){
    
}























