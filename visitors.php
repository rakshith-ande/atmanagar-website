<?php
	$con = new mysqli("localhost","root","","anr");

	//adding new visitors
	$visitor_ip = $_SERVER['REMOTE_ADDR'];

	//checking if visitor is unique
	$sql = "SELECT * FROM visitors_count WHERE ip_address='$visitor_ip'";
	$result = $con->query($sql);

	if(!$result)
	{
		die("retreiving error".$sql);
	}
	$total_visitors = $result->num_rows;

	if($total_visitors<1)
	{
		$sql = "INSERT INTO visitors_count(ip_address) values('$visitor_ip')";
	$result = $con->query($sql);
	}


	//retreiving existing visitors
	$sql = "SELECT * FROM visitors_count";
	$result = $con->query($sql);

	if(!$result)
	{
		die("retreiving error".$sql);
	}

	$total_visitors = $result->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<title>visitors count</title>
	<style>
		
		.blob {
			background: black;
			border-radius: 50%;
			margin: 10px;
			height: 20px;
			width: 20px;

			box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
			transform: scale(1);
			animation: pulse 2s infinite;
		}

		@keyframes pulse {
			0% {
				transform: scale(0.95);
				box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
			}

			70% {
				transform: scale(1);
				box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
			}

			100% {
				transform: scale(0.95);
				box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
			}
		}

	</style>
</head>
<body>

	<div>
		<h1>Visitors Count</h1>
		<h3><?php echo $total_visitors?></h3>
	</div>

	<div class="blob"></div>

</body>
</html>