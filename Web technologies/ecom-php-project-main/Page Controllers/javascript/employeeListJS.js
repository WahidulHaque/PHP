function validateINSERT(id,pass)
{
	var sid=document.getElementById('sid').value;
	
	if(sid == 1)
	{	
		var ret = true;
		
		var eid = document.getElementById('eidTF').value;
		id=eid;
		pass=document.getElementById('pass').value;
		var ename = document.getElementById('enameTF').value;
		var design = document.getElementById('design').value;
		var sal = document.getElementById('salTF').value;
		var mob = document.getElementById('mobTF').value;
		var mail = document.getElementById('mailTF').value;
		
		if(eid.trim().length < 1)
		{
			document.getElementById('eidTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('eidTFErr').innerHTML="";
		}
		
		if(ename.trim().length < 1)
		{
			document.getElementById('enameTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('enameTFErr').innerHTML="";
		}
		
		if(design.trim().length < 1 || design == "4")
		{
			document.getElementById('designErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('designErr').innerHTML="";
		}
		
		if(sal < 1)
		{
			document.getElementById('salTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('salTFErr').innerHTML="";
		}
		
		if(mob < 1)
		{
			document.getElementById('mobTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			if(mob.trim().length !== 11)
			{
				document.getElementById('mobTFErr').innerHTML="&#10033;";
				ret = false;
			}
			
			else
			{
				document.getElementById('mobTFErr').innerHTML="";
			}				
		}
		
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(mail.trim().length < 1 || !mail.match(mailformat))
		{
			document.getElementById('mailTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('mailTFErr').innerHTML="";
		}
		
		if(ret == true)
		{
			
			var con = confirm("Assign User "+id+"?");
			
			if(con == true)
			{
				if(id != "" && pass !="")
				{
					alert("On valid insertion-\nUser ID: "+id+"\nPassword: "+pass+"");
					return ret;
				}
				
				else
				{
					alert("PRESS \"INSERT\" AGAIN TO GET PASSWORD.");
					return ret;
				}
					
			}
				
			else
			{
				alert("Canceled..");
				return false;
			}		
		}
		
		else
		{
			return ret;
		}
	}
	
	else
	{
		alert("Access Denied");
		return false;
	}
}

function validateUPDATE()
{
	var sid=document.getElementById('sid').value;
	
	if(sid == 1)
	{	
		var ret = true;
		
		var eid = document.getElementById('eidTF').value;
		var ename = document.getElementById('enameTF').value;
		var design = document.getElementById('design').value;
		var sal = document.getElementById('salTF').value;
		var mob = document.getElementById('mobTF').value;
		var mail = document.getElementById('mailTF').value;
		
		if(eid.trim().length < 1)
		{
			document.getElementById('eidTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('eidTFErr').innerHTML="";
		}
		
		if(ename.trim().length < 1)
		{
			document.getElementById('enameTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('enameTFErr').innerHTML="";
		}
		
		if(design.trim().length < 1 || design == "4")
		{
			document.getElementById('designErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('designErr').innerHTML="";
		}
		
		if(sal < 1)
		{
			document.getElementById('salTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('salTFErr').innerHTML="";
		}
		
		if(mob < 1)
		{
			document.getElementById('mobTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('mobTFErr').innerHTML="";
		}
		
		if(mob.trim().length !== 11)
		{
			document.getElementById('mobTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('mobTFErr').innerHTML="";
		}
		
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(mail.trim().length < 1 || !mail.match(mailformat))
		{
			document.getElementById('mailTFErr').innerHTML="&#10033;";
			ret = false;
		}
		else
		{
			document.getElementById('mailTFErr').innerHTML="";
		}
		
		if(ret == true)
		{
			
			var con = confirm("Update Information of "+eid+"?");
			
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
			return ret;
		}
	}
	
	else
	{
		alert("Access Denied");
		return false;
	}
}

function validateDELETE()
{
	var sid=document.getElementById('sid').value;
	
	if(sid == 1)
	{	
		var ret = true;
		
		var eid = document.getElementById('eidTF').value;
		
		if(eid.trim().length < 1)
		{
			document.getElementById('eidTFErr').innerHTML="&#10033;";
			ret = false;
		}
		
		if(ret == true)
		{
			
			var con = confirm("Delete Employee "+eid+"?");
			
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
			return ret;
		}
	}
	
	else
	{
		alert("Access Denied");
		return false;
	}
}

function clear() 
{
	alert("ok");
	var rowCount = document.getElementById('tab').rows.length;
	var i=0;
	
	for(i = 0; i<rowCount; i++)
	{
		document.getElementById('tab').deleteRow(0);
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
		win.document.write('<title>Employee Table</title>');   // <title> FOR PDF HEADER.
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