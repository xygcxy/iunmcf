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
	});
	$('.change-en').toggle(function () {
		$('.en').css('display', 'block');
		$('.zh').css('display', 'none');
		$(this).text('改变语言：中文');
	}, function () {
		$('.en').css('display', 'none');
		$('.zh').css('display', 'block');
		$(this).text('Change Language:English');
	})

	

})()