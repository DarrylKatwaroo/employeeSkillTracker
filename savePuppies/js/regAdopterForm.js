function validate() {

	var validated = true;
    var l = /^[A-Za-z]+$/;
    var ln = /^[0-9a-zA-Z]+$/;
	var n = /^[0-9]+$/;
	var q = document.forms["regAdopterForm"]["email"].value;
	var s = document.forms["regAdopterForm"]["contact"].value;
	var atpos = q.indexOf("@");
    var dotpos = q.lastIndexOf(".");
	var hyphenpos = s.lastIndexOf("-");
	var x;
	var y;
	var found = "false";
	var invalidChars = "{,},],[,!,@,#,$,%,^,&,*,(,),-,_,<,>,;,:,/,~,\,`,+,=,?";
	
	
	 //First name Validation
    if (regAdopterForm.fname.value == "" || regAdopterForm.fname.value == null) {
        document.getElementById("errorFname").innerHTML = "*You must enter a first name";
        validated = false;
		
    } else if (!regAdopterForm.fname.value.match(l)) {
        document.getElementById("errorFname").innerHTML = "*First name must only contain letters";
        validated = false;
		

    } else if (regAdopterForm.fname.value.length < 3 || regAdopterForm.fname.value.length > 30) {
        document.getElementById("errorFname").innerHTML = "*First name must be between 3-30 characters";
        validated = false;

    } else {
        document.getElementById("errorFname").innerHTML = '';
    }

    //Last name validation
    if (regAdopterForm.lname.value == "" || regAdopterForm.lname.value == null) {
        document.getElementById("errorLname").innerHTML = "*You must enter a last name";
        validated = false;
    } else if (!regAdopterForm.lname.value.match(l)) {
        document.getElementById("errorLname").innerHTML = "*Last name must only contain letters";
        validated = false;

    } else if (regAdopterForm.lname.value.length < 3 || regAdopterForm.lname.value.length > 30) {
        document.getElementById("errorLname").innerHTML = "*Last name must be between 3-30 characters";
        validated = false;
    } else {
        document.getElementById("errorLname").innerHTML = "";
    }
	
	//Address validation
	if (regAdopterForm.address.value == "" || regAdopterForm.address.value == null) {
        document.getElementById("errorAddress").innerHTML = "*You must enter an address";
        validated = false;
		
    } else if (regAdopterForm.address.value.length < 3 || regAdopterForm.address.value.length > 30) {
        document.getElementById("errorAddress").innerHTML = "*Address must be between 3-30 characters";
        validated = false;

    } else {
        document.getElementById("errorAddress").innerHTML = '';
    }

	//Date of Birth validation
	if (regAdopterForm.doB.value == "" || regAdopterForm.doB.value == null) {
        document.getElementById("errorDOB").innerHTML = "*You must enter a date of birth";
        validated = false;
    }else {
        document.getElementById("errorDOB").innerHTML = '';
    }
	
	//National ID validation
	if (regAdopterForm.n_id.value == "" || regAdopterForm.n_id.value == null) {
        document.getElementById("errorNID").innerHTML = "*You must enter a national ID";
        validated = false;
    }else if (!regAdopterForm.n_id.value.match(n)){
		document.getElementById("errorNID").innerHTML = "*National ID number cannot contain letters";
		validated = false;

	}else if (regAdopterForm.n_id.value.length <10 || regAdopterForm.n_id.value.length > 12) {

        document.getElementById("errorNID").innerHTML = "*Natonal ID number must be between 10-12 characters";
        validated = false;
    } else {
        document.getElementById("errorNID").innerHTML = '';
    }
	
	  //Email Validation
    if (regAdopterForm.email.value == "" || regAdopterForm.email.value == null) {
        document.getElementById("errorEmail").innerHTML = "*You must enter an email address";
        validated = false;

    } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= q.length) {
        document.getElementById("errorEmail").innerHTML = "*Not a valid email address";
        validated = false;
    } else {
        document.getElementById("errorEmail").innerHTML = ''
    }
	
	//Contact validation
	if (regAdopterForm.contact.value == "" || regAdopterForm.contact.value == null) {
        document.getElementById("errorContact").innerHTML = "*You must enter a contact number";
        validated = false;
		
    } else if (!regAdopterForm.contact.value.match(n)){
		document.getElementById("errorContact").innerHTML = "*Contact number cannot contain letters";
		validated = false;

	}else if (regAdopterForm.contact.value.length < 7 || regAdopterForm.contact.value.length > 30) {
        document.getElementById("errorContact").innerHTML = "*Contact must be between 7-15 characters";
        validated = false;
    }else {
        document.getElementById("errorContact").innerHTML = '';
    }
	
    return validated;
}