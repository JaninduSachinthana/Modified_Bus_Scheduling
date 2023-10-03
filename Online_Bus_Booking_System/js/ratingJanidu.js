function starmark(num){
	
	for(var i=1; i <= num; ++i){
		document.getElementById(i).style.color = "gold";
	}
	document.getElementById("set").style.display = "block";
}
function setrate(){
	for(var i=1; i <= 5; ++i){
		document.getElementById(i).style.color = null;
	}
	document.getElementById("set").style.display = "none";
}