window.onload = pageLoad;

var jdata;

function pageLoad(){
	document.getElementById('postbutton').onclick = getData;
	//document.getElementById('displayPic').onclick = fileUpload;
	var username = document.getElementById("username").innerHTML;
	readJson();
}

function getData(){
	var msg = document.getElementById("comment").value;
	document.getElementById("comment").value = "";
	writeJson(msg);
}


function readJson(){
	var xhr = new XMLHttpRequest(); 
	xhr.open("GET", "js/tradeDB.json"); 
	xhr.onload = function() { 
		jdata = JSON.parse(this.responseText);
		console.log(jdata);
		showPost(jdata);
	}; 
	xhr.onerror = function() { alert("ERROR!"); }; 
	xhr.send(); 
}

function writeJson(msg){
	//add data 
	var username = document.getElementById("username").innerHTML;
	var temp = {};
	temp["user"] = username;
	temp["message"] = msg;
	var temp2 = parseInt(Object.keys(jdata).length)+1;
	jdata["post"+temp2] = temp;
	console.log(jdata);
	var xhr = new XMLHttpRequest(); 
	var jstring = JSON.stringify(jdata)
	xhr.open("GET", "js/writeJson.php?data="+jstring); 
	xhr.onload = function() { 
		console.log(this.responseText);
		showPost(jdata);
	}; 
	xhr.onerror = function() { alert("ERROR!"); }; 
	xhr.send(); 
	
}

function showPost(data){
	var keys = Object.keys(data);
	var divTag = document.getElementById("feed-container");
	divTag.innerHTML = "";
	for (var i = keys.length-1; i >=0 ; i--) {

		var temp = document.createElement("div");
		temp.className = "newsfeed";
		divTag.appendChild(temp);
		var temp1 = document.createElement("div");
		temp1.className = "postmsg";
		temp1.innerHTML = data[keys[i]]["message"];
		temp.appendChild(temp1);
		var temp1 = document.createElement("div");
		temp1.className = "postuser";
		
		temp1.innerHTML = "Contact: "+data[keys[i]]["user"]+"<hr>";
		temp.appendChild(temp1);
		
	}
}