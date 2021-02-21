<?php
	include 'menu.php';
	include 'pulse_boot.php';	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Rakshith Ande">
	<meta name="keywords" content="Atmanagar, Atmanagar metaplly, village website, atmanagar jagityal, atmanagar, atmanagar website, atmanagar telangana, atmanagar telangana 505325, 505 325">
	<meta name="author" content="Rakshith Ande">
	<title>Atmanagar GP</title>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/carousel.css">
</head>
<body>
	<div class="pusher">
	<!--image slider-->
	<div class="carousel slide" data-ride="carousel" data-interval="3000" id="slider">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="./images/1.jpg" alt="slide1">
			</div>
			<div class="carousel-item">
				<img src="./images/22.jpg" alt="slide2">
			</div>
			<div class="carousel-item">
				<img src="./images/33.jpg" alt="slide3">
			</div>
			<div class="carousel-item">
				<img src="./images/44.jpg" alt="slide4">
			</div>
		</div>

		<a href="#slider" class="carousel-control-next" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
		<a href="#slider" class="carousel-control-prev" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>

		<ul class="carousel-indicators">
			<li data-target="#slider" data-slide-to="0" class="active"></li>
			<li data-target="#slider" data-slide-to="1"></li>
			<li data-target="#slider" data-slide-to="2"></li>
			<li data-target="#slider" data-slide-to="3"></li>
		</ul>
	</div><br>
	<!--//image slider-->

	<div class="ui stackable grid">
			<div class="one wide column"></div>
			<div class="nine wide column">
				<div class="ui orange padded aligned raised segment">
					<div class="ui orange header">About</div>
					<div class="ui divider"></div>
					<div class="content">
						<p style="text-align: justify;text-indent: 40px;font-size: 18px;">
							 A village is a clustered human settlement or community, larger than a hamlet but smaller than a town (although the word is often used to describe both hamlets and smaller towns), with a population ranging from a few hundred to a few thousand. Though villages are often located in rural areas, the term urban village is also applied to certain urban neighborhoods. Villages are normally permanent, with fixed dwellings; however, transient villages can occur. Further, the dwellings of a village are fairly close to one another, not scattered broadly over the landscape. 
						</p>
					</div>
				</div>
			</div>
			<div class="five wide column">
				<div class="ui blue raised segment">
					<a class="ui red ribbon medium label"> <i class="bullhorn icon"></i> Atmanagar Activity Updates</a>
					<div class="ui container" style="height: 200px;"><br>
						<marquee direction="up" scrollamount="2" onmouseout="this.start()" onmouseover="this.stop()" style="height: 200px;">
							<?php

								$sql = "select date(date) as date,title from updates order by sl_no desc";
								$result = $con->query($sql);
								if($result->num_rows>0)
								{
									while($row = $result->fetch_assoc())
									{
										echo '

										<div class="ui field">
											<label class="ui blue label">'.$row['date'].'</label> : <span>'.$row['title'].'</span>
										</div>
                                        <div class="ui divider"></div>
										';
									}
								}

							?>
						</marquee>
					</div>
					<div class="ui blue centered small header">
						<a href="updates-atmanagar.php">See updates...</a>
					</div>
				</div>
			</div>
	</div>
	<?php
		include 'footer.php';
	?>
</div>
</body>
</html>