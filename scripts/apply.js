(function(){

	function getQueryString(name) {
	    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	    var r = window.location.search.substr(1).match(reg);
	    if (r != null) return unescape(r[2]); return null;
    }

	var type = getQueryString('type');

	var value;

	var change = function (select, type) {
		if (select == 'film' || type == '') {
			$('.apply_film').css('display', 'block');
			$('.communication').css('display', 'none');
			$('.design').css('display', 'none');
			$('.innovation').css('display', 'none');
			value = 'film';
		};
		if (select == 'communication' || type == '2') {
			$('.apply_film').css('display', 'none');
			$('.communication').css('display', 'block');
			$('.design').css('display', 'none');
			$('.innovation').css('display', 'none');
			value = 'communication';
		};
		if (select == 'design' || type == '3') {
			$('.apply_film').css('display', 'none');
			$('.communication').css('display', 'none');
			$('.design').css('display', 'block');
			$('.innovation').css('display', 'none');
			value = 'design';
		};
		if (select == 'innovation' || type == '4') {
			$('.apply_film').css('display', 'none');
			$('.communication').css('display', 'none');
			$('.design').css('display', 'none');
			$('.innovation').css('display', 'block');
			value = 'innovation';
		};
		return value;
	}
	if(type){		
		var value = change('', type);
		$(".select-control").val(value);
	}
	$(".select-control").change(function () {
		var select = $(this).children('option:selected').val();
		change(select);
		
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