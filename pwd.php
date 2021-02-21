<?php
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$pwd=$_POST['pwd'];

		$con = new mysqli("localhost","root","","anr");
		$pwd1=md5($pwd);
		$sql="insert into admin values('$name','$pwd1')";
		$result=$con->query($sql);
		if($result)
		{
			echo "successfull";
		}
		else
		{
			echo "failed";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="text" name="name">
		<input type="text" name="pwd">
		<input type="submit" name="submit">
	</form>
</body>
</html>