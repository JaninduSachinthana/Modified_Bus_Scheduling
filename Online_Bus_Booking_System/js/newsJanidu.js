function loaddata(name){
	if(name == "btn1"){
		if(document.getElementById("para1").style.display == "block"){
			document.getElementById("para1").style.display = "none";
		}
		else{
			document.getElementById("para1").style.display = "block";
		}
		document.getElementById("para2").style.display = "none";
		document.getElementById("para3").style.display = "none";
		document.getElementById("para4").style.display = "none";
	}
	else if(name == "btn2"){
		if(document.getElementById("para2").style.display == "block"){
			document.getElementById("para2").style.display = "none";
		}
		else{
			document.getElementById("para2").style.display = "block";
		}
		document.getElementById("para1").style.display = "none";
		document.getElementById("para3").style.display = "none";
		document.getElementById("para4").style.display = "none";
	}
	else if(name == "btn3"){
		if(document.getElementById("para3").style.display == "block"){
			document.getElementById("para3").style.display = "none";
		}
		else{
			document.getElementById("para3").style.display = "block";
		}
		document.getElementById("para1").style.display = "none";
		document.getElementById("para2").style.display = "none";
		document.getElementById("para4").style.display = "none";
	}
	else if(name == "btn4"){
		if(document.getElementById("para4").style.display == "block"){
			document.getElementById("para4").style.display = "none";
		}
		else{
			document.getElementById("para4").style.display = "block";
		}
		document.getElementById("para1").style.display = "none";
		document.getElementById("para2").style.display = "none";
		document.getElementById("para3").style.display = "none";
	}
}