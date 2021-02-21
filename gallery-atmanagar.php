<?php
	include 'menu.php';
    require 'db.php';
    include 'pulse.php';
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

<?php
    /*Pagination code*/

    //number of rows per page
    $results_per_page = 3;

    //find out how many row in db table
    $sqli = "SELECT * from updates";
    $result = $con->query($sqli);
    $number_of_results = mysqli_num_rows($result);

    //determine total number of pages
    $number_of_pages = ceil($number_of_results/$results_per_page);

    //determine which page number visitor is currently on
    if(!isset($_GET['page']))
    {
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    //determine the limit  starting number for the results on the displaying page
    $this_page_first_result = ($page-1)*$results_per_page;

    //retreive selected results from database and display them on page
    /*$sqli2 = "SELECT * FROM updates LIMIT ".$this_page_first_result.','.$results_per_page;
    $result = mysqli_query($con, $sqli2);
    while($row = mysqli_fetch_array($result))
    {
        echo $row['date']."<br>";
    }

    //display the link to the pages
    for($page=1;$page<=$number_of_pages;$page++)
    {
        echo '<a href="updates-atmanagar.php?page='. $page .'">'. $page .'</a>';
    }*/

?>

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
                <button class="ui blue left icon button" type="submit" name="type" value="all">
                    <i class="plus icon"></i>
                    Add/Upload Photos
                </button>    
                </form>
            </div>

        </div><br>

        ';
    }
?>


			<div class="ui red padded aligned header raised segment">		
            	<h2>Atmanagar Activities</h2>
				<div class="ui horizontal divider"><i class="red star icon"></i></div>

			<div class="ui stackable grid">
			<div class="sixteen wide column">
			<div class="demo-gallery">
                <div class="ui stackable grid">

            <div class="demo-gallery">

                <ul id="lightgallery" class="list-unstyled row">

                <?php
                    $sql = "SELECT * from gallery order by sl_no desc LIMIT ".$this_page_first_result.','.$results_per_page;
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
                   ?>
             </ul>
        </div>

            </div>
        </div>

        </div>
        </div>
	</div>

			</div>
		</div>
	</div>

	<!--Pagination code-->
    <?php
        echo "<h4 style='text-align: center;font-weight: normal; '>page ".$page." of ".$number_of_pages."</h4>";
    ?>
	<div class="ui centered header" style="margin-top: -10px;">
		<div class="ui pagination menu">
			<?php
                //display the link to the pages
                echo '<a class="item" href="gallery-atmanagar.php?page='. 1 .'">first</a>';
                if($page>1)
                {
                    echo '<a class="item" href="gallery-atmanagar.php?page='. ($page-1).'">';echo '<< prev</a>';
                }
                echo '<a class="active item">'. $page .'</a>';
                if($page<$number_of_pages)
                {
                    echo '<a class="item" href="gallery-atmanagar.php?page='. ($page+1).'">next >></a>';
                }
                /*for($page=1;$page<=$number_of_pages;$page++)
                {
                    echo '<a class="item" href="gallery-atmanagar.php?page='. $page .'">'. $page .'</a>';
                }*/
                echo '<a class="item" href="gallery-atmanagar.php?page='. $number_of_pages .'">last</a>';
            ?>
		</div>
	</div>
	<!--Pagination code ends-->


	<?php
		include 'footer.php';
	?>

</body>
</html>
<script>
	$(document).ready(function(){
        $('#lightgallery').lightGallery(); 
    });
</script>