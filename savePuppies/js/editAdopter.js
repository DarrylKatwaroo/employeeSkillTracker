function validate() {

	var validated = true;
    var l = /^[A-Za-z]+$/;
    var ln = /^[0-9a-zA-Z]+$/;
	var n = /^[0-9]+$/;
	var q = document.forms["editAdopterForm"]["newEmail"].value;
	var s = document.forms["editAdopterForm"]["newContact"].value;
	var atpos = q.indexOf("@");
    var dotpos = q.lastIndexOf(".");
	var hyphenpos = s.lastIndexOf("-");
	var x;
	var y;
	var found = "false";
	var invalidChars = "{,},],[,!,@,#,$,%,^,&,*,(,),-,_,<,>,;,:,/,~,\,`,+,=,?";
	
	
	 //First name Validation
    if (editAdopterForm.newFname.value == "" || editAdopterForm.newFname.value == null) {
        document.getElementById("errorFname").innerHTML = "*You must enter a first name";
        validated = false;
		
    } else if (!editAdopterForm.newFname.value.match(l)) {
        document.getElementById("errorFname").innerHTML = "*First name must only contain letters";
        validated = false;
		

    } else if (editAdopterForm.newFname.value.length < 3 || editAdopterForm.newFname.value.length > 30) {
        document.getElementById("errorFname").innerHTML = "*First name must be between 3-30 characters";
        validated = false;

    } else {
        document.getElementById("errorFname").innerHTML = '';
    }

    //Last name validation
    if (editAdopterForm.newLname.value == "" || editAdopterForm.newLname.value == null) {
        document.getElementById("errorLname").innerHTML = "*You must enter a last name";
        validated = false;
    } else if (!editAdopterForm.newLname.value.match(l)) {
        document.getElementById("errorLname").innerHTML = "*Last name must only contain letters";
        validated = false;

    } else if (editAdopterForm.newLname.value.length < 3 || editAdopterForm.newLname.value.length > 30) {
        document.getElementById("errorLname").innerHTML = "*Last name must be between 3-30 characters";
        validated = false;
    } else {
        document.getElementById("errorLname").innerHTML = "";
    }
	
	//Address validation
	if (editAdopterForm.newAddress.value == "" || editAdopterForm.newAddress.value == null) {
        document.getElementById("errorAddress").innerHTML = "*You must enter an address";
        validated = false;
		
    } else if (editAdopterForm.newAddress.value.length < 3 || editAdopterForm.newAddress.value.length > 30) {
        document.getElementById("errorAddress").innerHTML = "*Address must be between 3-30 characters";
        validated = false;

    } else {
        document.getElementById("errorAddress").innerHTML = '';
    }

	//Date of Birth validation
	if (editAdopterForm.newDoB.value == "" || editAdopterForm.newDoB.value == null) {
        document.getElementById("errorDOB").innerHTML = "*You must enter a date of birth";
        validated = false;
    }else {
        document.getElementById("errorDOB").innerHTML = '';
    }
	
	//National ID validation
	if (editAdopterForm.newN_id.value == "" || editAdopterForm.newN_id.value == null) {
        document.getElementById("errorNID").innerHTML = "*You must enter a national ID";
        validated = false;
    }else if (!editAdopterForm.newN_id.value.match(n)){
		document.getElementById("errorNID").innerHTML = "*National ID number cannot contain letters";
		validated = false;

	}else if (editAdopterForm.newN_id.value.length <10 || editAdopterForm.newN_id.value.length > 12) {

        document.getElementById("errorNID").innerHTML = "*Natonal ID number must be between 10-12 characters";
        validated = false;
    } else {
        document.getElementById("errorNID").innerHTML = '';
    }
	
	  //Email Validation
    if (editAdopterForm.newEmail.value == "" || editAdopterForm.newEmail.value == null) {
        document.getElementById("errorEmail").innerHTML = "*You must enter an email address";
        validated = false;

    } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= q.length) {
        document.getElementById("errorEmail").innerHTML = "*Not a valid email address";
        validated = false;
    } else {
        document.getElementById("errorEmail").innerHTML = ''
    }
	
	//Contact validation
	if (editAdopterForm.newContact.value == "" || editAdopterForm.newContact.value == null) {
        document.getElementById("errorContact").innerHTML = "*You must enter a contact number";
        validated = false;
		
    } else if (!editAdopterForm.newContact.value.match(n)){
		document.getElementById("errorContact").innerHTML = "*Contact number cannot contain letters";
		validated = false;

	}else if (editAdopterForm.newContact.value.length < 7 || editAdopterForm.newContact.value.length > 30) {
        document.getElementById("errorContact").innerHTML = "*Contact must be between 7-15 characters";
        validated = false;
    }else {
        document.getElementById("errorContact").innerHTML = '';
    }
	
    return validated;
}