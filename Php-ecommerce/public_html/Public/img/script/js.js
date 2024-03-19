var attempt = 3;
function validate(){
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
if ( username == "ASSASSIN" && password == "123"){
alert ("Login successfully");
window.location = "html2.html"; 
return false;
}
else{
attempt --;
alert("fail");

{
document.getElementById("username").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("submit").disabled = true;
return false;
}
}
}