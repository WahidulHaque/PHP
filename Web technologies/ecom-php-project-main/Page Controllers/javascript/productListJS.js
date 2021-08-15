function validateINSERT()
{
	var sid = document.getElementById("sid").value;
	var ret = true;
	
	if(sid == 1 || sid == 2)
	{
		var pid = document.getElementById("pidTF").value;
		var pname = document.getElementById("pnameTF").value;
		var type = document.getElementById("type").value;
		var quant = document.getElementById("quantTF").value;
		var bp = document.getElementById("buyPriceTF").value;
		var sp = document.getElementById("sellPriceTF").value;
		
		if(pid.trim().length < 1)
		{
			document.getElementById("pErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("pErr").innerHTML = "";
		}
		
		if(pname.trim().length < 1)
		{
			document.getElementById("nErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("nErr").innerHTML = "";
		}
		
		
		if(type.trim().length < 1 || type == "SELECT")
		{
			document.getElementById("tErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("tErr").innerHTML = "";
		}
		
		if(quant < 1)
		{
			document.getElementById("qErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("qErr").innerHTML = "";
		}
		
		if(bp < 1)
		{
			document.getElementById("bErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("bErr").innerHTML = "";
		}
		
		if(sp < 1 || sp < bp)
		{
			document.getElementById("sErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("sErr").innerHTML = "";
		}
		
		if(ret == true)
		{
			var con = confirm("Add Product "+pid+"?");
			
			if(con == true)
			{
				return ret;
			}
			
			else
			{
				alert("Canceled..");
				return false;
			}
		}
		
		else
		{
			return false;
		}
	}
	
	else
	{
		alert("Access Denied.");
		return false;
	}
}

function validateUPDATE()
{
	var sid = document.getElementById("sid").value;
	var ret = true;
	
	if(sid == 1 || sid == 2)
	{
		var pid = document.getElementById("pidTF").value;
		var pname = document.getElementById("pnameTF").value;
		var type = document.getElementById("type").value;
		var quant = document.getElementById("quantTF").value;
		var bp = document.getElementById("buyPriceTF").value;
		var sp = document.getElementById("sellPriceTF").value;
		
		if(pid.trim().length < 1)
		{
			document.getElementById("pErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("pErr").innerHTML = "";
		}
		
		if(pname.trim().length < 1)
		{
			document.getElementById("nErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("nErr").innerHTML = "";
		}
		
		
		if(type.trim().length < 1 || type == "SELECT")
		{
			document.getElementById("tErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("tErr").innerHTML = "";
		}
		
		if(quant < 1)
		{
			document.getElementById("qErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("qErr").innerHTML = "";
		}
		
		if(bp < 1)
		{
			document.getElementById("bErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("bErr").innerHTML = "";
		}
		
		if(sp < 1 || sp < bp)
		{
			document.getElementById("sErr").innerHTML = "&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById("sErr").innerHTML = "";
		}
		
		if(ret == true)
		{
			var con = confirm("Update Product "+pid+"?");
			
			if(con == true)
			{
				return ret;
			}
			
			else
			{
				alert("Canceled..");
				return false;
			}
		}
		
		else
		{
			return false;
		}
	}

	else
	{
		alert("Access Denied.");
		return false;
	}
}

function validateDELETE()
{
	var sid = document.getElementById("sid").value;
	var btn = document.getElementById("btnNM").value;
	var ret = true;
	
	if(sid == 1 || sid == 2)
	{
		if(btn == "DELETE")
		{
			var pid = document.getElementById("pidTF").value;
			
			if(pid.trim().length < 1)
			{
				document.getElementById("pErr").innerHTML = "&#10033;";
				ret = false;
			}
			else
			{
				document.getElementById("pErr").innerHTML = "";
			}
			
			if(ret == true)
			{
				var con = confirm("Delete Product "+pid+"?");
				
				if(con == true)
				{
					return ret;
				}
				
				else
				{
					alert("Canceled..");
					return false;
				}
			}
			
			else
			{
				return false;
			}
		}
		
		else if(btn == "RE-AVAIL")
		{
			var pid = document.getElementById("pidTF").value;
			
			if(pid.trim().length < 1)
			{
				document.getElementById("pErr").innerHTML = "&#10033;";
				ret = false;
			}
			else
			{
				document.getElementById("pErr").innerHTML = "";
			}
			
			if(ret == true)
			{
				var con = confirm("Re-avail Product "+pid+"?");
				
				if(con == true)
				{
					return ret;
				}
				
				else
				{
					alert("Canceled..");
					return false;
				}
			}
			
			else
			{
				return false;
			}
		}
		
		else
		{
			alert="Something went wrong.";
			return false;
		}
	}
		
	else
	{
		alert("Access Denied.");
		return false;
	}
}

function savePDF() 
{
	var con = confirm("Are you sure you want to execute?");
	
	if(con == true)
	{
		var sTable = document.getElementById('printableTable').innerHTML;

		/*var style = "<style>";
		style = style + "table {width: 100%;font: 17px Calibri;}";
		style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
		style = style + "padding: 2px 3px;text-align: center;}";
		style = style + "</style>";*/
		var style = "<style>";
		style = style + "table{width: 100%;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse: collapse;font-style: bold;}";
		style = style + "table th {border: 2px solid #ddd;}";
		style = style + "table td{border: 2px solid #000000;padding: 8px;}";
		style = style + "table tr:nth-child(even) {background-color: #f2f2f2;}";
		style = style + "table tr:nth-child(odd) {background-color: #E6E6FA;}";
		style = style + "table th {padding-top: 8px;padding-bottom: 8px;text-align: center;background-color: #2E8B57;color: white;}";
		style = style + "</style>";
		

		// CREATE A WINDOW OBJECT.
		var win = window.open('', '', 'height=700,width=700');

		win.document.write('<html><head>');
		win.document.write('<title>Products Table</title>');   // <title> FOR PDF HEADER.
		win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
		win.document.write('</head>');
		win.document.write('<body>');
		win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
		win.document.write('</body></html>');

		win.document.close(); 	// CLOSE THE CURRENT WINDOW.

		win.print();    // PRINT THE CONTENTS.
		
		return true;
	}
	
	else
	{
		return false;
	}
}

