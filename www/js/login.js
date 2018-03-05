/*****************************************************************
	Functions For login page
******************************************************************/
window.onload = function()
{
	document.getElementById("username").focus();
	document.getElementById("username").select();
	$("#login_button").click(function()
	{
	    onLogin();         
	});	
}



function onLogin()
{
	//validation of input data
	var uid = document.getElementById("username").value;
	var upwd = document.getElementById("password").value;
	
	if( !isValidString( uid ) )
	{
		document.getElementById("username").focus();
		document.getElementById("username").select();
		return;
	}

	if( !isValidString( upwd ) )
	{
		document.getElementById("password").focus();
		document.getElementById("password").select();
		return;
	}
	
	document.getElementById("loginform").submit();
}

function onPwdKeydown(event)
{
	var evt = event ? event : ( (window.event) ? window.event : null );
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
        ((evt.which) ? evt.which : 0));

	if( charCode == 13 )
	{
		onLogin();
	}
	
	return true;
}

function onNameKeydown(event)
{
	var evt = event ? event : ( (window.event) ? window.event : null );
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
        ((evt.which) ? evt.which : 0));

	if( charCode == 13 || charCode == 9 )
	{
		document.getElementById("password").focus();
	}
	
	return true;
}

