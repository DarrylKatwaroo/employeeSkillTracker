function validate() {

	var validated = true;
    var l = /^[a-zA-Z_ ]*$/;
	var n = /^[0-9]+$/;
	var numbersOnly = /^[0-9\.]+$/;
	var decimal = /^[\d]{1,2}(\.[\d]{1,2})?$/;
	
	 //Name Validation
    if (regDogForm.name.value == "" || regDogForm.name.value == null) {
        document.getElementById("errorName").innerHTML = "*You must enter a name";
        validated = false;
			
    }else if (!regDogForm.name.value.match(l)) {
        document.getElementById("errorName").innerHTML = "*Dog's name must only contain letters";
        validated = false;
	
    }else if (regDogForm.name.value.length < 3 || regDogForm.name.value.length > 30) {
        document.getElementById("errorName").innerHTML = "*Dog's name must be between 3-30 characters";
        validated = false;
		
    }else {
        document.getElementById("errorName").innerHTML = '';
    }



    //Breed validation
    if (regDogForm.breed.value == "noselect") {
        document.getElementById("errorBreed").innerHTML = "*You must select a breed";
        validated = false;
	}else{
		document.getElementById("errorBreed").innerHTML = "";
	}
		
	
	//Dominant Colour validation
	 if (regDogForm.domCol.value == "noselect") {
        document.getElementById("errorDC").innerHTML = "*You must select a colour";
        validated = false;
	 }else{
		document.getElementById("errorDC").innerHTML = "";
	}	

		
	//Height validation
	if (regDogForm.height.value == "" || regDogForm.height.value == null) {
        document.getElementById("errorHeight").innerHTML = "*You must enter a height";
        validated = false;	
		
		
	}else if(!regDogForm.height.value.match(numbersOnly)){
		document.getElementById("errorHeight").innerHTML = "*Height cannot contain letters";
        validated = false;	
		
	}else if(!regDogForm.height.value.match(decimal)){
		document.getElementById("errorHeight").innerHTML = "*Height cannot be greater than '99.99'";
        validated = false;	
		
	}else{
		document.getElementById("errorHeight").innerHTML = "";
	}
	
	

	
	//Weight validation
	if (regDogForm.weight.value == "" || regDogForm.weight.value == null) {
	document.getElementById("errorWeight").innerHTML = "*You must enter a weight";
	validated = false;	
		
		
	}else if(!regDogForm.weight.value.match(numbersOnly)){
		document.getElementById("errorWeight").innerHTML = "*Weight cannot contain letters";
        validated = false;	
		
	}else if(!regDogForm.weight.value.match(decimal)){
		document.getElementById("errorWeight").innerHTML = "*Weight cannot be greater than '99.99'";
        validated = false;	
		
	}else{
		document.getElementById("errorWeight").innerHTML = "";
	}
	
	
	
	
	
	
	  //General Description Validation
     if (regDogForm.genDesc.value == "" || regDogForm.genDesc.value == null) {
        document.getElementById("errorDesc").innerHTML = "*You must enter a description";
        validated = false;
			
    }else if (!regDogForm.genDesc.value.match(l)) {
        document.getElementById("errorDesc").innerHTML = "*Description must only contain letters";
        validated = false;
	
    }else if (regDogForm.genDesc.value.length < 10 || regDogForm.genDesc.value.length > 30) {
        document.getElementById("errorDesc").innerHTML = "*Description must be between 10-30 characters";
        validated = false;
		
    }else {
        document.getElementById("errorDesc").innerHTML = "";
    }
	
	
	//Date Found validation
	if (regDogForm.dateFound.value == "" || regDogForm.dateFound.value == null) {
        document.getElementById("errorDF").innerHTML = "*You must enter a date";
        validated = false;			
	}else{
		document.getElementById("errorDF").innerHTML = "";
    }
	
	
	 //Status validation
    if (regDogForm.Status.value == "noselect") {
        document.getElementById("errorStatus").innerHTML = "*You must select a status";
        validated = false;
	}else{
		document.getElementById("errorStatus").innerHTML = "";
	}
	
	return validated;
	
	
	

}