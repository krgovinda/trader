function validateFname() {
   var fname = document.getElementById('inputFname');
   if(!fname.value || !isNaN(fname.value))
   {
   	alert("Invalid Fname");
   	fname.focus();
   	return false;
   }
}
function validateLname(){
   var lname = document.getElementById('inputLname');
   if(!lname.value || !isNaN(lname.value))
   {
   	alert("Invalid lname");
   	lname.focus();
   	return false;
   }
}
function validateSname(){
   var sname = document.getElementById('inputStore');
   if (!sname.value || !isNaN(sname.value))
   {
   	alert("Invalid");
   	sname.focus();
   	return false;
   }
}
function validateAddress(){
   var add = document.getElementById("inputAddress1");
   if (!add.value )
   {
   	alert("Invalid");
   	add.focus();
   	return false;
   }
}
function validateMobile(){
   var mob = document.getElementById('inputMobile');
   if(!mob.value || mob.value.length!=10 || isNaN(mob.value))
   {
   	alert("Mobile must be of 10 digit");
   	mob.focus();
   	return false;
   }
}
function validateCity(){
   var city = document.getElementById('inputCity');
   if (!city.value || !isNaN(city.value)) 
   {
   	alert("invalid city");
   	city.focus();
   	return false;
   }
}
function validatePincode(){
    var pin = document.getElementById('inputPincode');
   if(!pin.value || pin.value.length != 6 || isNaN(pin.value))
   {
    alert("Must be of 6 digit");
    pin.focus();
    return false;
   }
}
function validatePassword(){
   var pass = document.getElementById('inputPassword1');
   var ab =  /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
   if(!pass.value || !ab.test(pass.value))
   {
   	alert("password should be at least 8 character long and must include a number, a lowercase and a Uppercase letter");
   	pass.focus();
   	return false;
   }
}
function validateConfirmPassword(){
   var cpass = document.getElementById('inputPassword2');
   if(!cpass.value || cpass.value == pass.value)
   {
   	alert("password did not match");
   	cpass.focus();
   	return false;
   }
}
function validateEmail(){
   var mail = document.getElementById('inputEmail');
   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(!mail.value || !filter.test(mail.value))
   {
   	alert("Invalid email");
   	return false;
   }
}

function email(){
    var result = true;
    var e = document.getElementById('inputEmail').value;
    var atindex = e.indexOf('@');
    var dotindex = e.lastIndexOf('.');
    if(atindex<1 || dotindex>=e.length-2 || dotindex=atindex<3){
        result= false;
    }
    return(result);
}