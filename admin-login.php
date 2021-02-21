<?php
	include 'menu.php';
	require 'db.php';
	include 'pulse.php';

	if(isset($_POST['submit']))
	{
		$name=$_POST['uname'];
		$pwd=$_POST['pwd'];
		$namee="";
		if(empty($name)&&empty($pwd))
		{
			echo "<div class='ui tiny modal'>
					<i class='red circle close icon'></i>
					<div class='content'>
						<b>Fields should not be empty</b>
					</div>
				  </div>";

		}
		else
		{
			$sql="select * from admin where user='".$name."' and password='".md5($pwd)."'";
			$result=$con->query($sql);
			if($result->num_rows==1)
			{
				while($row=$result->fetch_assoc())
				{
					$namee=$row['user'];
					$_SESSION['user']=$namee;
					echo "<script>window.location.href = 'index.php'</script>";
					break;
				}
			}
			else
			{
				echo "<div class='ui tiny modal'>
						<i class='red circle close icon'></i>
						<div class='content'><b>username or password is invalid</b></div>
					  </div>";
			}
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login | Atmanagar</title>
	
<script>
	$('.tiny.modal').modal('show');

	function show()
	{
		var x = document.getElementById('showp');
		var y = document.getElementById('e').className;
		if(x.type === "password")
		{
			x.type = "text";
			e.className = "eye icon";
		}
		else
		{
			x.type = "password";
			e.className = "eye slash icon";
		}
	}
</script>
</head>
<body>
	<div class="ui stackable grid">
		<div class="five wide column"></div>
		<div class="six wide column">
			<div class="ui teal raised segment">
				<div class="ui teal raised padded aligned centered header segment">
					<div class="ui teal header">
						Admin login
					</div>
				</div>
				<div class="ui raised segment">
					<form class="ui form" method="post">
						<div class="ui field">
							<label class="ui label">UserName</label>
							<input type="text" name="uname" placeholder="enter username">
						</div>
						<div class="ui field">
							<label class="ui label">Password</label>
							<div class="ui right labeled input">
								<input type="password" name="pwd" placeholder="enter your password" id="showp">
								<label class="ui icon label" onclick="show()">
									<i class="eye slash icon" id="e"></i>
								</label>
							</div>
						</div>
						<!--<div class="ui field">
							<input type="checkbox" onclick="show()">&nbsp;Show Password
						</div>-->
						<div class="ui field">
							<center><button type="submit" name="submit" class="ui blue button" data-toggle="modal" data-target=".bd-example-modal-sm">Login</button></center>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<?php
		include 'footer.php';
	?>

</body>
</html>