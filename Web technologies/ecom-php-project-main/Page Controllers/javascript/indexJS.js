function showPass() 
{
	var passTF = document.getElementById("passTF");
	
	if (passTF.type === "password") 
	{
		passTF.type = "text";
	} 
	
	else 
	{
		passTF.type = "password";
	}
}
