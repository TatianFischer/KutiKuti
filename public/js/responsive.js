$(function(){
	slidderImageApropos();

	$(window).on('resize', function(){
		slidderImageApropos();
	})

	function slidderImageApropos(){
		if($(window).width() < 977){
			$('.desc1').hide();
			$('.desc1_slider').show();
		} else {
			$('.desc1').show();
			$('.desc1_slider').hide();
		}
	}
})