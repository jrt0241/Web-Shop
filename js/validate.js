
function validFname()
{
	var name=document.getElementById("FirstName").value;
	var pattern= /^[a-zA-Z 0-9 ]*/;
	
	
	if(!pattern.test(name))
		{
		document.getElementById("Fnerror").innerHTML="<font color=red>First Name doesnot allow special charaters</font>";
		return false;
		}
	else 
		{
		document.getElementById("Fnerror").innerHTML="";
		return true;
		}
}
function validLname()
{
	var name=document.getElementById("LastName").value;
	var pattern= /^[a-zA-Z0-9]*$/;
	
	
	if(!pattern.test(name))
		{
		document.getElementById("Lnerror").innerHTML="<font color=red>Last Name doesnot allow special charaters</font>";
		return false;
		}
	else 
		{
		document.getElementById("Lnerror").innerHTML="";
		return true;
		}
}
function validpass()
{
	var password=document.getElementById("Password").value;
	var pattern=/^[A-Za-z,0-9]{6,10}$/;
	var pattern1=/^[A-Za-z,0-9]{0,5}$/;
	var pattern2=/^[A-Za-z,0-9]{11,50}$/;
	
	else if(pattern1.test(password)||pattern2.test(password))
	{
	
	document.getElementById("perror").innerHTML="<font color=red>Password should be of 6 and max of 10 characters</font>";
	return false;
	}
	else if(pattern.test(password)) {
		//alert("no prob");
		document.getElementById("perror").innerHTML="";
		return true;
	}
	else if(!pattern1.test(password)||!pattern2.test(password))
	{
	//alert("special char");
	document.getElementById("perror").innerHTML="<font color=red>Password should not contain special characters or space</font>";
	return false;
	}
	
	}
	function validemail(){
	var x=document.getElementById("Email").value;
	var pattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if(x==""||x==null)
    	{
	document.getElementById("emerror").innerHTML="<font color='red'>Email address cannot be null</font>";
	return false;
    	}
    else if(!pattern.test(x))
    	{
		document.getElementById("emerror").innerHTML="<font color='red'>Invalid Email Address</font>";
		return false;
    	}
	else{
		document.getElementById("emerror").innerHTML="";
		return  true;
	}
    
}
function finalValidation()
{
	if(validFname()==true && validpass()==true &&   validLname()==true && validemail()==true)
		{
		return true;
		}
	else 
	{
		return false;
		
	}
		
	
	}
	
