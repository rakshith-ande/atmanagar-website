<?php
	include 'menu.php';
	require 'db.php';
	if(isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$desc = $_POST['description'];
		$t_desc = $_POST['t_description'];
		$arr = array("jpg","JPG","jpeg","JPEG","png","PNG","gif","GIF");
		$maxsize = 600000;
		$filename = $_FILES['pic']['name'];
		$ext = pathinfo($filename,PATHINFO_EXTENSION);
		if(!in_array($ext, $arr))
		{
			echo "

				<h4>fields should be jpg,jpeg,png or gif format only</h4>

				";
		}
		else
		{
			if($_FILES['pic1']['size']>=$maxsize)
			{
				echo "<h2 style='color: red;margin-left: 2%;'>Photo size should be less than 600kbs</h2>";
			}
			else
			{
				move_uploaded_file($_FILES['pic']['tmp_name'],"uploads/".$_FILES['pic']['name']);
				$path = "uploads/".$_FILES['pic']['name'];
				$sql="insert into updates(title,image,description,telugu_description) values('$title','$path','$desc','$t_desc')";
				if(!empty($title)&&!empty($path)&&!empty($desc))
				{
					if($con->query($sql)==TRUE)
					{
						echo "<div class='ui tiny modal'>
								<i class='green circle close icon'></i>
								<div class='content'>
									<b>Update added successfully</b>
								</div>
							  </div>";
					}
					else
					{
						echo "<div class='ui tiny modal'>
								<i class='red circle close icon'></i>
								<div class='content'>
									<b>Failed to add update</b>
								</div>
							  </div>";
					}
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add-Updates | Atmanagar</title>
</head>
<body>
<br>

	<div class="ui stackable grid">
		<div class="three wide column"></div>
		<div class="ten wide column">
			<div class="ui teal raised segment">
				<div class="ui teal padded aligned centered header segment">
					<div class="ui teal header">Add Update</div>
				</div>
				<div class="ui raised segment">
					<form class="ui form" method="post" enctype="multipart/form-data">
						<div class="ui field">
							<label class="ui label">Title of the update</label>
							<input type="text" name="title" placeholder="enter the title of the update" required>
						</div>
						<div class="ui field">
							<label class="ui label">Add a photo</label>
							<input type="file" name="pic">
						</div>
						<div class="ui field">
							<label class="ui label">Description about update</label>
							<textarea cols="50" rows="5" placeholder="description...." name="description" required></textarea>
						</div>
						<div class="ui field">
							<label class="ui label">Description in Telugu</label>
							<textarea cols="50" rows="5" placeholder="description...." name="t_description"></textarea>
						</div>
						<div class="ui field">
							<button class="ui red button" type="reset">Reset</button>
							<button class="ui blue button" type="submit" name="submit">Add Update</button>
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
<script>
	$('.tiny.modal').modal('show');
</script>