<?php
	include 'menu.php';
	require 'db.php';
	include 'pulse.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Updates | Atmanagar</title>
</head>
<body>

<?php
    /*Pagination code*/

	//number of rows per page
	$results_per_page = 2;

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

<?php

	if(isset($_SESSION['user'])==TRUE)
    {
        echo '
        <div class="ui one stackable grid container">
            <div class="six wide column">
                <form action="add-update.php" method="post">
                <button class="ui blue left icon button" type="submit" name="type" value="all">
                    <i class="plus icon"></i>
                    Add Updates
                </button>    
                </form>
            </div>

        </div>

        ';
    }
?>

<br>
	<div class="ui stackable container">
		<div class="ui green padded aligned raised segment">
			<a class="ui red ribbon big label"><i class="bullhorn icon"></i> Atmanagar Activity Updates</a>
			<div class="ui container">

				<?php
					//retreive selected results from database and display them on page
					$sql = "SELECT sl_no,date(date) as date,title,image,description,telugu_description from updates order by date desc LIMIT ".$this_page_first_result.','.$results_per_page;
					$result = $con->query($sql);
					if($result->num_rows>0)
					{
						while($row = $result->fetch_assoc())
						{
							echo' 
							
							<div class="ui raised segment" id="'.$row['sl_no'].'">
								<label class="ui blue label">'.$row['date'].'</label> : 
								<span style="font-size: 15px;">'.$row['title'].'</span>';
								if(isset($_SESSION['user'])==true)
								{
									echo "<button class='ui red right floated icon button' onclick='delUp(".$row['sl_no'].")'><i class='trash icon'></i></button>";
								}
								echo '
							</div>


							<!--updates modal-->
							<div class="ui stackable modal" id="l">
								<i class="red close icon"></i>
								<div class="header">
							    	'.$row['title'].'
							  	</div>
							  	<div class="scrolling content">
							  	<div class="ui stackable grid">

							  		<div class="two wide column"></div>
							  		<div class="eight wide column" id="update">
							  			<img src="'.$row['image'].'">
							  		</div>

							  		<div class="row">
							  			<div class="one wide column"></div>
							  			<div class="fourteen wide column">
							  				<p style="text-indent: 40px;text-align: justify;font-size: 15px;">'.$row['description'].'</p>
							  				<p style="text-indent: 40px;text-align: justify;font-size: 15px;">'.$row['telugu_description'].'</p>
							  			</div>
							  		</div>

							  	</div>
							  	</div>
							  	<div class="actions">
							    	<div class="ui blue deny button">
							      		Close
							    	</div>
							  	</div>
							</div>
							<!--//updates modal-->

							';
						}
					}

				?>
				

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
				echo '<a class="item" href="updates-atmanagar.php?page='. 1 .'">first</a>';
				if($page>1)
				{
					echo '<a class="item" href="updates-atmanagar.php?page='. ($page-1).'">';echo '<< prev</a>';
				}
				echo '<a class="active item">'. $page .'</a>';
				if($page<$number_of_pages)
				{
					echo '<a class="item" href="updates-atmanagar.php?page='. ($page+1).'">next >></a>';
				}
				/*for($page=1;$page<=$number_of_pages;$page++)
				{
					echo '<a class="item" href="updates-atmanagar.php?page='. $page .'">'. $page .'</a>';
				}*/
				echo '<a class="item" href="updates-atmanagar.php?page='. $number_of_pages .'">last</a>';
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

	$('#10').click(function(){
      $('#l')
        .modal('setting', 'transition', 'vertical flip')
        .modal('show');
    });

</script>