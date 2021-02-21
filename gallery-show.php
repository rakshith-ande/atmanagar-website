<?php
	include 'menu.php';
    require 'db.php';
	$type = $_GET['type'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gallery | Atmanagar</title>
	<script type="text/javascript" src="./js/image.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/image.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" >
    <style>
        #icon:hover
        {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
<br>
	<div class="ui stackable grid">
		<div class="sixteen wide column">
			<div class="ui container">

<?php


    if(isset($_SESSION['user'])==TRUE)
    {
        echo '

        <div class="ui one stackable grid">
            <div class="six wide column">
                <form action="gallery_uploads/image_upload.php" method="post">
                <button class="ui blue left icon button" type="submit" name="type" value="swb">
                    <i class="plus icon"></i>
                    Add Photos/add in Swachh Bharat
                </button>    
                </form>
            </div>

            <div class="five wide column">
                <form action="gallery_uploads/image_upload.php" method="post">
                <button class="ui blue left icon button" type="submit" name="type" value="hh">
                    <i class="plus icon"></i>
                    Add Photos/add in Haritha Haram
                </button>    
                </form>
            </div>

            <div class="five wide column">
                <form action="gallery_uploads/image_upload.php" method="post">
                <button class="ui blue left icon button" type="submit" name="type" value="o">
                    <i class="plus icon"></i>
                    Add Photos/add in All Others
                </button>    
                </form>
            </div>

        </div><br>

        ';
    }

	if($type=="swb")
	{
		echo '

            <div class="ui three stackable buttons">
                <div class="ui blue button" onclick="fun1()">Swachh Bharat</div>
                <div class="ui button" onclick="fun2()">Haritha Haram</div>
                <div class="ui button" onclick="fun3()">All Others</div>
            </div><br><br>


			<div class="ui red padded aligned header raised segment">		
            Swachh Bharat
				<div class="ui horizontal divider"><i class="red star icon"></i></div>

			<div class="ui stackable grid">
			<div class="sixteen wide column">
			<div class="demo-gallery">
                <div class="ui stackable grid">

            <div class="demo-gallery">

                <ul id="lightgallery" class="list-unstyled row">';

                    $sql = "select * from gallery where type='swb' order by sl_no desc";
                    $result = $con->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $param=$row['sl_no'];
                            echo "

                            <li style='list-style-type: none;' class='col-xs-6 col-sm-4 col-md-2 col-lg-2' data-responsive='".$row["path"]."' data-src='".$row['path']."'>
                                <a href=''>
                                    <img class='img-responsive' src='".$row['path']."'>
                                </a>";
                            if(isset($_SESSION['user'])==TRUE)
                            {
                                echo "
                                <button class='ui red left icon button' onclick='func1($param)''>
                                    <i class='trash icon'></i>
                                    Delete Photo
                                </button>

                                ";
                            }
                        }
                    }
                    
            echo '
                        </ul>
                    </div>

                        </div>
                    </div>

                    </div>
                    </div>
        		</div>

		';
	}
	if($type=="hh")
	{
		echo '

        <div class="ui three stackable buttons">
            <div class="ui button" onclick="fun1()">Swachh Bharat</div>
            <div class="ui blue button" onclick="fun2()">Haritha Haram</div>
            <div class="ui button" onclick="fun3()">All Others</div>
        </div><br><br>


		<div class="ui red padded aligned header raised segment">		
            Haritha haram
			<div class="ui horizontal divider"><i class="red star icon"></i></div>

			<div class="ui stackable grid">
			<div class="sixteen wide column">
			<div class="demo-gallery">
                <div class="ui stackable grid">

            <div class="demo-gallery">

                <ul id="lightgallery" class="list-unstyled row">';
                
                    $sql = "select * from gallery where type='hh' order by sl_no desc";
                    $result = $con->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $param=$row['sl_no'];
                            echo "

                            <li style='list-style-type: none;' class='col-xs-6 col-sm-4 col-md-2 col-lg-2' data-responsive='".$row["path"]."' data-src='".$row['path']."'>
                                <a href=''>
                                    <img class='img-responsive' src='".$row['path']."'>
                                </a>";
                            if(isset($_SESSION['user'])==TRUE)
                            {
                                echo "
                                <button class='ui red left icon button' onclick='func1($param)''>
                                    <i class='trash icon'></i>
                                    Delete Photo
                                </button>

                                ";
                            }
                        }
                    }


            echo '        
                </ul>
            </div>

                </div>
            </div>

            </div>
            </div>
		</div>';

	}
	if($type=="o")
	{
		echo '		

        <div class="ui three stackable buttons">
            <div class="ui button" onclick="fun1()">Swachh Bharat</div>
            <div class="ui button" onclick="fun2()">Haritha Haram</div>
            <div class="ui blue button" onclick="fun3()">All Others</div>
        </div><br><br>


        <div class="ui red padded aligned header raised segment">
            All Others
			<div class="ui horizontal divider"><i class="red star icon"></i></div>

			<div class="ui stackable grid">
			<div class="sixteen wide column">
			<div class="demo-gallery">
                <div class="ui stackable grid">

            <div class="demo-gallery">

                <ul id="lightgallery" class="list-unstyled row">';
                
                   
                    $sql = "select * from gallery where type='o' order by sl_no desc";
                    $result = $con->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $param=$row['sl_no'];
                            echo "

                            <li style='list-style-type: none;' class='col-xs-6 col-sm-4 col-md-2 col-lg-2' data-responsive='".$row["path"]."' data-src='".$row['path']."'>
                                <a href=''>
                                    <img class='img-responsive' src='".$row['path']."'>
                                </a>";
                            if(isset($_SESSION['user'])==TRUE)
                            {
                                echo "
                                <button class='ui red left icon button' onclick='func1($param)''>
                                    <i class='trash icon'></i>
                                    Delete Photo
                                </button>

                                ";
                            }
                        }
                    } 

        echo '
                </ul>
            </div>

                </div>
            </div>

            </div>
            </div>
		</div>

	   ';
	}
?>

			</div>
		</div>
	</div>
<br>

	<?php
		include 'footer.php';
	?>

</body>
</html>
<script>
	
	function fun1()
	{
		location.href="gallery-show.php?type=swb";
	}

	function fun2()
	{
		location.href="gallery-show.php?type=hh";
	}

	function fun3()
	{
		location.href="gallery-show.php?type=o";
	}

    function func1(param)
    {
        location.href="./parameter.php?param="+param;
    }

	$(document).ready(function(){
        $('#lightgallery').lightGallery(); 
    });
</script>