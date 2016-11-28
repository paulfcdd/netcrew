'use strict';

$(document).ready(function () {

	var hash = window.location.hash;
	$('#currentHash').attr('value', hash);

	if (hash == '') {
		$('#currentHash').attr('value', '#main');
		var div = $('.tab-content div');
		div.each(function () {
			var activeDiv = $(this);
			if (activeDiv.attr('id') == 'main') {
				activeDiv.addClass('active');
			}
		});
	}

	$('.left-menu li').each(function () {
		var a = $(this).find('a');
		var href = a.attr('href');

		if (hash == href) {
			var id = href.replace('#','');
			$('.tab-content div').each(function () {
				var div = $(this);
				if (div.attr('id') == id) {
					div.addClass('active');
				}
			});
			$(this).addClass('active')

		}

	});
});

$('.left-menu a').click(function () {
	var hash = $(this).attr('href');
	window.location.hash = hash;
	$('#currentHash').attr('value', hash);
});
