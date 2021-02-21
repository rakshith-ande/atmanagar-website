var myVar;
var x=0;
function func()
{
	myVar=setInterval(fun,3000);
}
function fun()
{
	x++;
	if(x%2==0)
	{
		document.getElementById('head1').style.display="none";
		document.getElementById('head2').style.display="block";
	}
	else
	{
		document.getElementById('head1').style.display="block";
		document.getElementById('head2').style.display="none";
	}
}


function logout()
{
	location.href="./logout.php";
}