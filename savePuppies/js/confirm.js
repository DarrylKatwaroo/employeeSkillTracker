function confirmDel() {
	
if (confirm("Are you sure you want to delete this record?")) {
		$.get("deleteDog.php");
		return true;
}else{
		return false;
	}
}