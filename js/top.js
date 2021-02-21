$(document).ready(function(){

	$(window).scroll(function(){
		if($(this).scrollTop() > 20)
		{
			$('#gototop').fadeIn();	
		}
		else
		{
			$('#gototop').fadeOut();
		}
	});

	$('#gototop').click(function(){
		$('html, body').animate({scrollTop : 0},500);
	});
});