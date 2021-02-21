<?php 
	include 'menu.php';
	require 'db.php';
	include 'pulse.php';

	//retreiving existing visitors
	$sql = "SELECT * FROM visitors_count";
	$result = $con->query($sql);

	if(!$result)
	{
		die("retreiving error ".$sql);
	}

	$total_visitors = $result->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<title>About | Atmanagar</title>
	<style>
		#grid
		{
			background-color: #ffffff;

		}
		#count
		{
			font-size: 50px;
			color: black;
		}
		#gap
		{
			height: 200px !important;
			width: 250px !important;
		}
	</style>
</head>
<body>
<br>

	<div class="ui stackable container">

		<div class="ui blue padded aligned raised segment">
			<div class="ui blue header">Population</div>
			<div class="ui divider"></div>
			<div class="ui center aligned basic segment">
			<div class="ui stackable grid" id="grid">
				<div class="two wide column"></div>
				<div class="three wide column">
					<div id="gap" class="ui raised circular segment">
						<span class="count" id="count">6000</span>
						<h3 id="desc">Total Population</h3>
					</div>
				</div>
				<div class="three wide column">
					<div id="gap" class="ui raised circular segment">
						<span class="count" id="count">3000</span>
						<h3 id="desc">Men</h3>
					</div>
				</div>
				<div class="three wide column">
					<div id="gap" class="ui raised circular segment">	
						<span class="count" id="count">3000</span>
						<h3 id="desc">Women</h3>
					</div>
				</div>
				<div class="three wide column">
					<div id="gap" class="ui raised circular segment">
						<span class="count" id="count">4500</span>
						<h3 id="desc">Total voters</h3>
					</div>
				</div>
			</div>
			</div>
		</div>

		<div class="ui pink padded aligned raised segment">
			<div class="ui pink header">Education</div>
			<div class="ui divider"></div>
			<div class="ui stackable grid">
				<div class="six wide column"></div>
				<div class="three wide column">
					<div id="gap" class="ui raised circular segment">
						<span class="count" id="count">200</span>
						<h3 id="desc">ps strength</h3>
					</div>
				</div>
			</div>
		</div>

		<div class="ui brown padded aligned raised segment">
			<div class="ui brown header">Swachh Bharat</div>
			<div class="ui divider"></div>

		</div>

		<div class="ui orange padded aligned raised segment">
			<div class="ui orange header">EGS</div>
			<div class="ui divider"></div>

		</div>

		<div class="ui violet padded aligned raised segment">
			<div class="ui violet header">IKP</div>
			<div class="ui divider"></div>

		</div>

		<div class="ui green padded aligned raised segment">
			<div class="ui green header">Agriculture</div>
			<div class="ui divider"></div>

		</div>


		<div class="ui light orange padded aligned raised segment">
			<div class="ui light orange header">Map Location of Atmanagar</div>
			<div class="ui divider"></div>

			<div class="ui stackable grid">
				<div class="two wide column"></div>
				<div class="fourteen wide column">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3777.7660943594487!2d78.61476125506229!3d18.76398220441791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1590230462997!5m2!1sen!2sin" frameborder="0" allowfullscreen="" aria-hidden="false" id="iframe"></iframe>
				</div>
			</div>
		
		</div>

		<div class="ui blue padded aligned raised segment">
			<div class="ui blue header">Developer</div>
			<div class="ui divider"></div>
			
			<div class="ui blue centered header">
				<a>RAKSHITH ANDE</a><br>
				S/O GNANESHWAR ANDE<br>
				Email : rakshith.ande@yahoo.com
			</div>
		</div>

		<div class="ui pink padded aligned raised segment">
			<div class="ui pink header">Atmanagar Website Visitors Count</div>
			<div class="ui divider"></div>
			
			<div class="ui pink centered header"><?php echo number_format($total_visitors+1000000)?></div>
		</div>	

	</div><br>

	<?php
		include 'footer.php';
	?>

</body>
</html>
<script>
	$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
	   });
	});
</script>