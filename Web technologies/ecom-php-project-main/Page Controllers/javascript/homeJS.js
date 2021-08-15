function access()
{
	var sid=document.getElementById('sid').value;
	
	if(sid == 3)
	{
		alert("Access Denied");
		return false;
	}
	
	else
	{
		return true;
	}
}