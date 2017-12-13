function changeMeToNumber() {
  var x = 101;
  document.getElementById("firstVar").innerHTML = x;
}

function getNewName() {
  var name = "Juan Dela Cruz"
  document.getElementById("secondVar").innerHTML = name;
}

function welcome() {
  var message = "Welcome to JavaScript programming!!!";
  document.getElementById("thirdVar").innerHTML = message;
}




var var1 = 10;
var var2 = 3;
var result = 0;

document.getElementById("var1").innerHTML = var1;
document.getElementById("var2").innerHTML = var2;

document.getElementById("result").innerHTML = result;


function addThem() {
  var1 = parseInt(document.getElementById("var1").value);
  var2 = parseInt(document.getElementById("var2").value);
  var result = var1 + var2;
  document.getElementById("result").innerHTML = result;
}

function subtractThem() {
  var1 = parseInt(document.getElementById("var1").value);
  var2 = parseInt(document.getElementById("var2").value);
  var result = var1 - var2;
  document.getElementById("result").innerHTML = result;
}

function multiplyThem() {
  var1 = parseInt(document.getElementById("var1").value);
  var2 = parseInt(document.getElementById("var2").value);
  var result = var1 * var2;
  document.getElementById("result").innerHTML = result;
}

function divideThem() {
  var1 = parseInt(document.getElementById("var1").value);
  var2 = parseInt(document.getElementById("var2").value);
  var result = var1 / var2;
  document.getElementById("result").innerHTML = result;
}

function modulateThem() {
  var1 = parseInt(document.getElementById("var1").value);
  var2 = parseInt(document.getElementById("var2").value);
  var result = var1 % var2;
  document.getElementById("result").innerHTML = result;
}
