function userEntry(name) {//name is being passed from the search form (newSearch.php.) look for (this.value).
  if (name.length==0) { 
    document.getElementById("liveSearch").innerHTML="";
    document.getElementById("liveSearch").style.border="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("liveSearch").innerHTML=this.responseText;
      document.getElementById("liveSearch").style.border="1px solid #A5ACB2";
	  document.getElementById("liveSearch").style.borderTop="0px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","searchExecute.php?value="+name,true);
  xmlhttp.send();
}

