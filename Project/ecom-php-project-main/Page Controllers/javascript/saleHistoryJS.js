function srch()
{
	var xhttp = new XMLHttpRequest();
	
	var key1 = document.getElementById('srchHistDateTF').value;
	var key2 = document.getElementById('srchHistCusNameTF').value;
	
	xhttp.onreadystatechange=function()
	{
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById('tab').innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("GET","../DB Handler/advancedSaleHistorySearchDB.php?key1="+key1+"&key2="+key2,true);
	//xhttp.open("GET","../DB Handler/employeeDB.php?key="+key,true);
	xhttp.send();
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