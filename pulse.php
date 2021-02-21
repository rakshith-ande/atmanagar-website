<link rel="stylesheet" type="text/css" href="./css/pulse.css">
<!--developer pulse-->
<div class="pulse" id="dev">
	<i class="info circle big red icon"></i>
</div>
<!--//developer pulse-->

<!--developer pulse modal-->
<div class="ui modal" id="dev1">
	<div class="ui span">
		<div class="ui centered green raised header raised segment">
        	Developer
        </div>
    </div>
    <div class="content">
		<div class="ui teal centered header raised segment">
			Name : Rakshith Ande<br>
			S/O  : Gnaneshwar Ande<br>
			Email: rakshith.ande@yahoo.com
		</div>
	</div>
	<div class="actions">
		<div class="ui green ok button">
			<i class="checkmark icon"></i>
			Okay
		</div>
	</div>
</div>
<!--developer pulse modal-->
<script>
	$('#dev').click(function(){
	 	$('#dev1').modal({
	 		blurring: true
		}).modal('show');
	});
</script>