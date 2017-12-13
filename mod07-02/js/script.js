function redFunc() {
	document.getElementById("red-box").style.backgroundColor = "red";
}

function orangeFunc() {
	document.getElementById("orange-box").style.backgroundColor = "orange";
}

function yellowFunc() {
	document.getElementById("yellow-box").style.backgroundColor = "yellow";
}

function greenFunc() {
	document.getElementById("green-box").style.backgroundColor = "green";
}

function blueFunc() {
	document.getElementById("blue-box").style.backgroundColor = "blue";
}

function indigoFunc() {
	document.getElementById("indigo-box").style.backgroundColor = "indigo";
}

function violetFunc() {
	document.getElementById("violet-box").style.backgroundColor = "violet";
}



var navClass;

function changeColor(className, id=null) {
	if (id == null) {
		navClass = className.replace("nav-box ", "")
		// NOTE: will get color selected from navigation
	} else {
		var boxClass = className.split(" ");
		// NOTE: will create arryw of class names
		var boxClassLength = boxClass.length;
		// NOTE: get size of array boxClass
		var element = document.getElementById(id);
		// NOTE: target the container to change the background color

		// NOTE: update current bg color
		if (boxClassLength > 1) {
			element.classList.remove(boxClass[1]);
			// NOTE: remove previous bg color
			element.className = boxClass[0] + " " + navClass;
			// NOTE: assign new bg color
		} else {
			element.className = boxClass + " " + navClass;
			// NOTE: assign initial bg color
		}
	}
}
