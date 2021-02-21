<?php
	session_start();
	require 'db.php';
	
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
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/semantic.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Dhurjati&display=swap" rel="stylesheet"> 
	<link rel="shortcut icon" href="./images/tel.gif">
	<link rel="stylesheet" type="text/css" href="./css/menu.css">
	<link rel="stylesheet" type="text/css" href="./css/top.css">
</head>
<body onload="func()">
	<div class="pusher">
	<!--heading-->
	<div class="ui stackable flexible grid" id="header">
		<div class="sixteen wide column">
			<div class="ui centered header" id="head1" style="margin-top: 10px;">
				<img src="./images/tel.gif">
				<h1 style="color: white;font-size: 40px;margin-top: 2px;" id="idd">ఆత్మనగర్ గ్రామ పంచాయతీ</h1>
				<span style="color: white;font-size: 30px;" id="idd"><span style="word-spacing: -10px;">మెట్ పల్లి</span> - జగిత్యాల - తెలంగాణ</span>
				<!--
					<div class="ui header" id="idd" style="color: white;font-size: 40px;margin-top: 0px;">
					ఆత్మనగర్ గ్రామ పంచాయతీ
				</div>
				<div class="ui header" id="idd" style="color: white;font-size: 30px;margin-top: -8px;">
					<span style="word-spacing: -10px;">మెట్ పల్లి</span> - జగిత్యాల - తెలంగాణ
				</div>
				-->
			</div>
			<div class="ui centered header" style="display: none;margin-top: 10px;" id="head2">
				<img src="./images/tel.gif">
				<h1 style="color: white;font-size: 35px;margin-top: -5px;" id="idd">ATMANAGAR GRAMA PANCHAYAT</h1>
				<span style="color: white;font-size: 30px;" id="idd">Metpally - Jagityal - Telangana</span>
			</div>
		</div>
	</div>
	<!--//heading-->


	<!--menu bar-->
	<?php
		if(isset($_SESSION['user'])==true)
		{
			echo '

			<div class="ui stackable menu" id="nrmlmenu">
				<a href="./" class="item"><b><i class="home icon"></i>HOME</b></a>
				<a href="./administration.php" class="item"><b><i class="building icon"></i>ADMINISTRATION</b></a>
				<a href="./updates-atmanagar.php" class="item"><b><i class="bullhorn icon"></i>UPDATES</b></a>
				<a href="./gallery-atmanagar.php" class="item"><b><i class="photo icon"></i>GALLERY</b></a>
				<a href="./about-atmanagar.php" class="item"><b><i class="info circle icon"></i>ABOUT</b></a>
				<div class="right menu">
					<a class="item" id="a"><b><i class="sign out icon"></i>ADMIN LOGOUT</b></a>
				</div>
			</div>
			<!--logout modal-->
			<div class="ui modal" id="aa">
					<div class="ui icon centered header">
                        <i class="power off icon"></i>
                        Are you sure wanna logout?
                    </div>
				<div class="actions">
					<div class="ui red cancel button">
						<i class="remove icon"></i>
						No
					</div>
					<div class="ui green ok button" onclick="logout()"">
						<i class="checkmark icon"></i>
						Ok
					</div>
				</div>
			</div>
			
			<!--
			<div class="ui basic modal" id="aa">
              <div class="ui icon header">
                <i class="power off icon"></i>
                Are you sure wanna logout?
              </div>
              <div class="actions">
                <div class="ui red basic cancel inverted button">
                  <i class="remove icon"></i>
                  No
                </div>
                <div class="ui green ok inverted button" onclick="logout()">
                  <i class="checkmark icon"></i>
                  Yes
                </div>
              </div>
            </div>
            -->
			<!--//logout modal-->

			';
		}
		else
		{
			echo '

			<div class="ui menu" id="nrmlmenu">
				<a href="./" class="active item"><b><i class="home icon"></i>HOME</b></a>
				<a href="./administration.php" class="item"><b><i class="building icon"></i>ADMINISTRATION</b></a>
				<a href="./updates-atmanagar.php" class="item"><b><i class="bullhorn icon"></i>UPDATES</b></a>
				<a href="./gallery-atmanagar.php" class="item"><b><i class="photo icon"></i>GALLERY</b></a>
				<a href="./about-atmanagar.php" class="item"><b><i class="info circle icon"></i>ABOUT</b></a>
				<div class="right menu">
					<a href="./admin-login.php" class="item"><b><i class="user icon"></i>ADMIN LOGIN</b></a>
				</div>
			</div>

			';
		}
	?>
	<!--//menu bar-->

	<!--side menu-->
	<?php
	    if(isset($_SESSION['user'])==true)
	    {
	        echo '
	            <div class="ui sidebar left vertical inverted menu" style="background-color: #2f5ea3;">
            		<a href="./" class="item" id="item"><b><i class="home icon"></i>&nbsp;&nbsp;HOME</b></a>
            		<a href="./administration.php" class="item" id="item"><b><i class="building icon"></i>&nbsp;&nbsp;ADMINISTRATION</b></a>
            		<a href="./updates-atmanagar.php" class="item" id="item"><b><i class="bullhorn icon"></i>&nbsp;&nbsp;UPDATES</b></a>
            		<a href="./gallery-atmanagar.php" class="item" id="item"><b><i class="photo icon"></i>&nbsp;&nbsp;GALLERY</b></a>
            		<a href="./about-atmanagar.php" class="item" id="item"><b><i class="info circle icon"></i>&nbsp;&nbsp;ABOUT</b></a>
            		<a class="item" id="d"><b><i class="sign out icon"></i>ADMIN &nbsp;&nbsp;LOGOUT</b></a>
            	</div>
            	<div class="ui basic icon top stackable menu" id="sidemenu">
            		<div id="toggle" class="item">
            			<i class="sidebar icon"></i>&nbsp;
            			Menu
            		</div>
            	</div>
	        ';
	    }
	    else
	    {
	        echo '
	        
	            <div class="ui sidebar left vertical inverted menu" style="background-color: #2f5ea3;">
            		<a href="./" class="item" id="item"><b><i class="home icon"></i>&nbsp;&nbsp;HOME</b></a>
            		<a href="./administration.php" class="item" id="item"><b><i class="building icon"></i>&nbsp;&nbsp;ADMINISTRATION</b></a>
            		<a href="./updates-atmanagar.php" class="item" id="item"><b><i class="bullhorn icon"></i>&nbsp;&nbsp;UPDATES</b></a>
            		<a href="./gallery-atmanagar.php" class="item" id="item"><b><i class="photo icon"></i>&nbsp;&nbsp;GALLERY</b></a>
            		<a href="./about-atmanagar.php" class="item" id="item"><b><i class="info circle icon"></i>&nbsp;&nbsp;ABOUT</b></a>
            		<a href="./admin-login.php" class="item" id="item"><b><i class="user icon"></i>&nbsp;&nbsp;ADMIN LOGIN</b></a>
            	</div>
            	<div class="ui basic icon top stackable menu" id="sidemenu">
            		<div id="toggle" class="item">
            			<i class="sidebar icon"></i>&nbsp;
            			Menu
            		</div>
            	</div>
	        
	        ';
	    }
	?>
	
	<!--scrollTop-->
	<i class="chevron circle up green big icon" id="gototop"></i>
	<!--//scrollTop-->
	
	
	<script type="text/javascript" src="./js/menu.js"></script>
	<script type="text/javascript" src="./js/top.js"></script>
	
	<!--//side menu-->
	<script>
		$('#toggle').click(function(){
			$('.ui.sidebar').sidebar('toggle');
		})
	</script>
	
</body>
</html>
<script>

	$(document).ready(function(){
	    $('.ui .item').on('click', function() {
	        $('.ui .item').removeClass('active');
	        $(this).addClass('active');
	    });             
	});

	/*$('.ui.menu a.item').on('click', function() {   
	  $(this)
	    .addClass('active')
	    .siblings('item')
	    .removeClass('active'); 
	});*/

	$('#a').click(function(){
	 	$('#aa').modal({
	 		blurring: true
		}).modal('show');
	});

	$('#d').click(function(){
	    $('.ui.sidebar').sidebar('toggle');
	 	$('#aa').modal({
	 		blurring: true
		}).modal('show');
		
	});
</script>