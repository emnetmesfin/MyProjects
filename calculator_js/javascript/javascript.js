function c(val)
{
	document.getElementById("d").value=val;
}
function v(val)
{
	document.getElementById("d").value+=val;
}
function mathFunctions(val){
	if(val=="sin"){
		c(Math.sin(document.getElementById("d").value));
	}
	else if(val=="cos"){
		c(Math.cos(document.getElementById("d").value));
	}
	else if(val=="tan"){
		c(Math.tan(document.getElementById("d").value));
	}
	else if(val=="log"){
		c(Math.log(document.getElementById("d").value));
	}
	else if(val=="sqrt"){
		c(Math.sqrt(document.getElementById("d").value));
	}
	else if(val=="E"){
		val = eval(document.getElementById("d").value);
		val = val * val;
		c(val);
	}
	else if(val=="PI"){
		c(Math.PI);
	}

	
}
function e() 
{ 
	try 
	{ 
	  c(eval(document.getElementById("d").value)) 
	} 
	catch(e) 
	{
	  c('Error') 
	} 
}