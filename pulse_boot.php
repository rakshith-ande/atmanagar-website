<link rel="stylesheet" type="text/css" href="./css/pulse.css">
<!--developer pulse-->
<div class="pulse" data-toggle="modal" data-target="#exampleModalCenter">
	<i class="info circle big green icon"></i>
</div>
<!--//developer pulse-->

<!--developer pulse modal-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="ui green centered header raised segment">
      		Developer
      	</div>
      </div>
      <div class="modal-header" style="margin-top: -25px;"></div>
      <div class="modal-body">
        <div class="ui teal centered header raised segment">
        	Name : Rakshith Ande<br>
        	S/O  : Gnaneshwar Ande<br>
        	Email: rakshith.ande@yahoo.com
        </div>
      </div>
      <div class="modal-footer">
      	<div class="actions">
			<div class="ui green ok button" data-dismiss="modal">
				<i class="checkmark icon"></i>
				Okay
			</div>
		</div>
      </div>
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