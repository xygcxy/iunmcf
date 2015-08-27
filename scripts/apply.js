(function(){
	$(".select-control").change(function () {
		var select = $(this).children('option:selected').val();
		if (select == 'film') {
			$('.apply_film').css('display', 'block');
			$('.communication').css('display', 'none');
			$('.design').css('display', 'none');
			$('.innovation').css('display', 'none');
		};
		if (select == 'communication') {
			$('.apply_film').css('display', 'none');
			$('.communication').css('display', 'block');
			$('.design').css('display', 'none');
			$('.innovation').css('display', 'none');
		};
		if (select == 'design') {
			$('.apply_film').css('display', 'none');
			$('.communication').css('display', 'none');
			$('.design').css('display', 'block');
			$('.innovation').css('display', 'none');
		};
		if (select == 'innovation') {
			$('.apply_film').css('display', 'none');
			$('.communication').css('display', 'none');
			$('.design').css('display', 'none');
			$('.innovation').css('display', 'block');
			
		};
	})

	

})()