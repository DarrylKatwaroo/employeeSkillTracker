function validate() {

	var validated = true;
    var l = /^[a-zA-Z_ ]*$/;
	var n = /^[0-9]+$/;
	var numbersOnly = /^[0-9\.]+$/;
	var decimal = /^[\d]{1,2}(\.[\d]{1,2})?$/;
	
	
	
	 //Name Validation
    if (editDogForm.newName.value == "" || editDogForm.newName.value == null) {
        document.getElementById("errorName").innerHTML = "*You must enter a name";
        validated = false;
			
    }else if (!editDogForm.newName.value.match(l)) {
        document.getElementById("errorName").innerHTML = "*Dog's name must only contain letters";
        validated = false;
	
    }else if (editDogForm.newName.value.length < 3 || editDogForm.newName.value.length > 30) {
        document.getElementById("errorName").innerHTML = "*Dog's name must be between 3-30 characters";
        validated = false;
		
    }else {
        document.getElementById("errorName").innerHTML = '';
    }




		
	

		
	//Height validation
	if (editDogForm.newHeight.value == "" || editDogForm.newHeight.value == null) {
        document.getElementById("errorHeight").innerHTML = "*You must enter a height";
        validated = false;	
		
		
	}else if(!editDogForm.newHeight.value.match(numbersOnly)){
		document.getElementById("errorHeight").innerHTML = "*Height cannot contain letters";
        validated = false;	
		
	}else if(!editDogForm.newHeight.value.match(decimal)){
		document.getElementById("errorHeight").innerHTML = "*Height cannot be greater than '99.99'";
        validated = false;	
		
	}else{
		document.getElementById("errorHeight").innerHTML = "";
	}
	
	
	
	//Weight validation
	if (editDogForm.newWeight.value == "" || editDogForm.newWeight.value == null) {
	document.getElementById("errorWeight").innerHTML = "*You must enter a weight";
	validated = false;	
		
		
	}else if(!editDogForm.newWeight.value.match(numbersOnly)){
		document.getElementById("errorWeight").innerHTML = "*Weight cannot contain letters";
        validated = false;	
		
	}else if(!editDogForm.newWeight.value.match(decimal)){
		document.getElementById("errorWeight").innerHTML = "*Weight cannot be greater than '99.99'";
        validated = false;	
		
	}else{
		document.getElementById("errorWeight").innerHTML = "";
	}
	
	
	
	
	  //General Description Validation
     if (editDogForm.newGenDesc.value == "" || editDogForm.newGenDesc.value == null) {
        document.getElementById("errorDesc").innerHTML = "*You must enter a description";
        validated = false;
			
    }else if (!editDogForm.newGenDesc.value.match(l)) {
        document.getElementById("errorDesc").innerHTML = "*Description must only contain letters";
        validated = false;
	
    }else if (editDogForm.newGenDesc.value.length < 10 || editDogForm.newGenDesc.value.length > 30) {
        document.getElementById("errorDesc").innerHTML = "*Description must be between 10-30 characters";
        validated = false;
		
    }else {
        document.getElementById("errorDesc").innerHTML = "";
    }
	
	
	//Date Found validation
	if (editDogForm.newDF.value == "" || editDogForm.newDF.value == null) {
        document.getElementById("errorDF").innerHTML = "*You must enter a date";
        validated = false;			
	}else{
		document.getElementById("errorDF").innerHTML = "";
    }
	
	
	
	return validated;
	
	
	

}