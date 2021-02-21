<?php
	
	session_start();
	$con = new mysqli("localhost","root","","anr");
	if(isset($_POST['submit']))
	{
		$n = $_POST['number'];
		$type = $_POST['name'];
		$arr = array("jpg","JPG","jpeg","JPEG","png","PNG","gif","GIF");
		$maxsize = 600000;
		

		//for one pic
		if($n==1)
		{
			$p1 = $_FILES['pic1']['name'];
			$ext1 = pathinfo($p1,PATHINFO_EXTENSION);

			if(!in_array($ext1, $arr))
			{
				echo "<h2 style='color: red;margin-left: 2%;'>all photos extension must be of type jpg or jpeg or png or gif</h2>";
			}
			else
			{
				if($_FILES['pic1']['size']>=$maxsize)
				{
					echo "<h2 style='color: red;margin-left: 2%;'>All photos size should be less than 600kbs</h2>";
				}
				else
				{
					move_uploaded_file($_FILES['pic1']['tmp_name'],$_FILES['pic1']['name']);
					$path1 = "gallery_uploads/".$_FILES['pic1']['name'];
					$sql="insert into gallery(path) values('$path1')";
					if($con->query($sql)==TRUE)
					{
						echo "

							<h2 style='color: green;margin-left: 2%;'>image uploaded successfully</h2>

						";
					}
					else
					{
						echo "

							<h2 style='color: red;margin-left: 2%;'>failed to upload image</h2>

						";
					}
				}
			}
		}


		//for two pics
		if($n==2)
		{
			$p1 = $_FILES['pic1']['name'];
			$p2 = $_FILES['pic2']['name'];
			$ext1 = pathinfo($p1,PATHINFO_EXTENSION);
			$ext2 = pathinfo($p2,PATHINFO_EXTENSION);

			if(!in_array($ext1, $arr) && !in_array($ext2, $arr))
			{
				echo "<h2 style='color: red;margin-left: 2%;'>all photos extension must be of type jpg or jpeg or png or gif</h2>";
			}
			else
			{
				if($_FILES['pic1']['size']>=$maxsize || $_FILES['pic2']['size']>=$maxsize)
				{
					echo "<h2 style='color: red;margin-left: 2%;'>All photos size should be less than 600kbs</h2>";
				}
				else
				{
					move_uploaded_file($_FILES['pic1']['tmp_name'],$_FILES['pic1']['name']);
					move_uploaded_file($_FILES['pic2']['tmp_name'],$_FILES['pic2']['name']);
					$path1 = "gallery_uploads/".$_FILES['pic1']['name'];
					$path2 = "gallery_uploads/".$_FILES['pic2']['name'];
					$sql1="insert into gallery(path) values('$path1')";
					$sql2="insert into gallery(path) values('$path2')";
					if($con->query($sql1)==TRUE && $con->query($sql2)==TRUE)
					{
						echo "

							<h2 style='color: green;margin-left: 2%;'>images uploaded successfully</h2>

						";
					}
					else
					{
						echo "

							<h2 style='color: red;margin-left: 2%;'>failed to upload images</h2>

						";
					}
				}
			}
		}


		//for three pics
		if($n==3)
		{
			$p1 = $_FILES['pic1']['name'];
			$p2 = $_FILES['pic2']['name'];
			$p3 = $_FILES['pic3']['name'];
			$ext1 = pathinfo($p1,PATHINFO_EXTENSION);
			$ext2 = pathinfo($p2,PATHINFO_EXTENSION);
			$ext3 = pathinfo($p3,PATHINFO_EXTENSION);

			if(!in_array($ext1, $arr) && !in_array($ext2, $arr) && !in_array($ext3, $arr))
			{
				echo "<h2 style='color: red;margin-left: 2%;'>all photos extension must be of type jpg or jpeg or png or gif</h2>";
			}
			else
			{
				if($_FILES['pic1']['size']>=$maxsize || $_FILES['pic2']['size']>=$maxsize || $_FILES['pic3']['size']>=$maxsize)
				{
					echo "<h2 style='color: red;margin-left: 2%;'>All photos size should be less than 600kbs</h2>";
				}
				else
				{
					move_uploaded_file($_FILES['pic1']['tmp_name'],$_FILES['pic1']['name']);
					move_uploaded_file($_FILES['pic2']['tmp_name'],$_FILES['pic2']['name']);
					move_uploaded_file($_FILES['pic3']['tmp_name'],$_FILES['pic3']['name']);
					$path1 = "gallery_uploads/".$_FILES['pic1']['name'];
					$path2 = "gallery_uploads/".$_FILES['pic2']['name'];
					$path3 = "gallery_uploads/".$_FILES['pic3']['name'];
					$sql1="insert into gallery(path) values('$path1')";
					$sql2="insert into gallery(path) values('$path2')";
					$sql3="insert into gallery(path) values('$path3')";
					if($con->query($sql1)==TRUE && $con->query($sql2)==TRUE && $con->query($sql3)==TRUE)
					{
						echo "

							<h2 style='color: green;margin-left: 2%;'>images uploaded successfully</h2>

						";
					}
					else
					{
						echo "

							<h2 style='color: red;margin-left: 2%;'>failed to upload images</h2>

						";
					}
				}
			}
		}


		//for four pics
		if($n==4)
		{
			$p1 = $_FILES['pic1']['name'];
			$p2 = $_FILES['pic2']['name'];
			$p3 = $_FILES['pic3']['name'];
			$p4 = $_FILES['pic4']['name'];
			$ext1 = pathinfo($p1,PATHINFO_EXTENSION);
			$ext2 = pathinfo($p2,PATHINFO_EXTENSION);
			$ext3 = pathinfo($p3,PATHINFO_EXTENSION);
			$ext4 = pathinfo($p4,PATHINFO_EXTENSION);

			if(!in_array($ext1, $arr) && !in_array($ext2, $arr) && !in_array($ext3, $arr) && !in_array($ext4, $arr))
			{
				echo "<h2 style='color: red;margin-left: 2%;'>all photos extension must be of type jpg or jpeg or png or gif</h2>";
			}
			else
			{
				if($_FILES['pic1']['size']>=$maxsize || $_FILES['pic2']['size']>=$maxsize || $_FILES['pic3']['size']>=$maxsize || $_FILES['pic4']['size']>=$maxsize)
				{
					echo "<h2 style='color: red;margin-left: 2%;'>All photos size should be less than 600kbs</h2>";
				}
				else
				{
					move_uploaded_file($_FILES['pic1']['tmp_name'],$_FILES['pic1']['name']);
					move_uploaded_file($_FILES['pic2']['tmp_name'],$_FILES['pic2']['name']);
					move_uploaded_file($_FILES['pic3']['tmp_name'],$_FILES['pic3']['name']);
					move_uploaded_file($_FILES['pic4']['tmp_name'],$_FILES['pic4']['name']);
					$path1 = "gallery_uploads/".$_FILES['pic1']['name'];
					$path2 = "gallery_uploads/".$_FILES['pic2']['name'];
					$path3 = "gallery_uploads/".$_FILES['pic3']['name'];
					$path4 = "gallery_uploads/".$_FILES['pic4']['name'];
					$sql1="insert into gallery(path) values('$path1')";
					$sql2="insert into gallery(path) values('$path2')";
					$sql3="insert into gallery(path) values('$path3')";
					$sql4="insert into gallery(path) values('$path4')";
					if($con->query($sql1)==TRUE && $con->query($sql2)==TRUE && $con->query($sql3)==TRUE && $con->query($sql4)==TRUE)
					{
						echo "

							<h2 style='color: green;margin-left: 2%;'>images uploaded successfully</h2>

						";
					}
					else
					{
						echo "

							<h2 style='color: red;margin-left: 2%;'>failed to upload images</h2>

						";
					}
				}
			}
		}


		//for five pics
		if($n==5)
		{
			$p1 = $_FILES['pic1']['name'];
			$p2 = $_FILES['pic2']['name'];
			$p3 = $_FILES['pic3']['name'];
			$p4 = $_FILES['pic4']['name'];
			$p5 = $_FILES['pic5']['name'];
			$ext1 = pathinfo($p1,PATHINFO_EXTENSION);
			$ext2 = pathinfo($p2,PATHINFO_EXTENSION);
			$ext3 = pathinfo($p3,PATHINFO_EXTENSION);
			$ext4 = pathinfo($p4,PATHINFO_EXTENSION);
			$ext5 = pathinfo($p5,PATHINFO_EXTENSION);

			if(!in_array($ext1, $arr) && !in_array($ext2, $arr) && !in_array($ext3, $arr) && !in_array($ext4, $arr) && !in_array($ext5, $arr))
			{
				echo "<h2 style='color: red;margin-left: 2%;'>all photos extension must be of type jpg or jpeg or png or gif</h2>";
			}
			else
			{
				if($_FILES['pic1']['size']>=$maxsize || $_FILES['pic2']['size']>=$maxsize || $_FILES['pic3']['size']>=$maxsize || $_FILES['pic4']['size']>=$maxsize || $_FILES['pic5']['size']>=$maxsize)
				{
					echo "<h2 style='color: red;margin-left: 2%;'>All photos size should be less than 600kbs</h2>";
				}
				else
				{
					move_uploaded_file($_FILES['pic1']['tmp_name'],$_FILES['pic1']['name']);
					move_uploaded_file($_FILES['pic2']['tmp_name'],$_FILES['pic2']['name']);
					move_uploaded_file($_FILES['pic3']['tmp_name'],$_FILES['pic3']['name']);
					move_uploaded_file($_FILES['pic4']['tmp_name'],$_FILES['pic4']['name']);
					move_uploaded_file($_FILES['pic5']['tmp_name'],$_FILES['pic5']['name']);
					$path1 = "gallery_uploads/".$_FILES['pic1']['name'];
					$path2 = "gallery_uploads/".$_FILES['pic2']['name'];
					$path3 = "gallery_uploads/".$_FILES['pic3']['name'];
					$path4 = "gallery_uploads/".$_FILES['pic4']['name'];
					$path5 = "gallery_uploads/".$_FILES['pic5']['name'];
					$sql1="insert into gallery(path) values('$path1')";
					$sql2="insert into gallery(path) values('$path2')";
					$sql3="insert into gallery(path) values('$path3')";
					$sql4="insert into gallery(path) values('$path4')";
					$sql5="insert into gallery(path) values('$path5')";
					if($con->query($sql1)==TRUE && $con->query($sql2)==TRUE && $con->query($sql3)==TRUE && $con->query($sql4)==TRUE && $con->query($sql5)==TRUE)
					{
						echo "

							<h2 style='color: green;margin-left: 2%;'>images uploaded successfully</h2>

						";
					}
					else
					{
						echo "

							<h2 style='color: red;margin-left: 2%;'>failed to upload images</h2>

						";
					}
				}
			}
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>image_upload</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div style="margin-left: 5%;margin-top: 5%;">
	<form method="post" enctype="multipart/form-data">

		<input type="hidden" name="name" value="<?php echo $_POST['type'];?>">
		<label>number of images</label>

		<select id="sel" onchange="fun()" name="number">
			<option></option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br><br>


		<label>photos: </label>
		<div id="file_" style="margin-left: 30px;margin-top: 10px;">
			
		</div><br><br>


		<button class="ui blue button" type="submit" name="submit">upload</button>
	</form>
	</div>
</body>
</html>
<script>
	function fun()
	{
		var x = document.getElementById('sel').value;
		if(x==1)
		{
			document.getElementById('file_').innerHTML="<input type='file' name='pic1'>";
		}
		if(x==2)
		{
			document.getElementById('file_').innerHTML="<input type='file' name='pic1'><br><br><input type='file' name='pic2'>";
		}
		if(x==3)
		{
			document.getElementById('file_').innerHTML="<input type='file' name='pic1'><br><br><input type='file' name='pic2'><br><br><input type='file' name='pic3'>";
		}
		if(x==4)
		{
			document.getElementById('file_').innerHTML="<input type='file' name='pic1'><br><br><input type='file' name='pic2'><br><br><input type='file' name='pic3'><br><br><input type='file' name='pic4'>";
		}
		if(x==5)
		{
			document.getElementById('file_').innerHTML="<input type='file' name='pic1'><br><br><input type='file' name='pic2'><br><br><input type='file' name='pic3'><br><br><input type='file' name='pic4'><br><br><input type='file' name='pic5'>";
		}
	}
</script>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./../css/semantic.min.css">
</head>
<body>

</body>
</html>
<?php
	echo "
	<br><br><br><br>
	<button onclick='fun1()' class='ui blue button' style='margin-left: 5%;'>GOTO Gallery</button>
	";
?>
<script>
	function fun1()
	{
		location.href='../gallery-atmanagar.php';
	}
</script>