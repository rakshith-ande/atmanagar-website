<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
</head>
<body>
<?php
	session_start();
	require 'db.php';
	$param = $_GET['param'];

	$sql1="select * from updates where sl_no=".$param."";
	$result=$con->query($sql1);
	if($result->num_rows==1)
	{
		while($row=$result->fetch_assoc())
		{
			unlink("".$row['image']."");
		}
	}

	$sql = "delete from updates where sl_no=".$param."";

	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

	if($con->query($sql)==TRUE)
	{
		echo '

			<h2 style="color: green;margin-left: 2%;">Successfully deleted the update</h2>

		';
	}
	else
	{
		echo '

			<h2 style="color: red;margin-left: 2%;">Failed to delete the update</h2>

		';
	}
	echo "
		<button class='ui blue button' onclick='fun()' style='margin-left: 5%;'>GOTO Updates</button>
	";
?>
</body>
</html>
<script>
	function fun()
	{
		location.href='./updates-atmanagar.php';
	}
</script>