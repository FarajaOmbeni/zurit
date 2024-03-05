(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$(document).ready(function(){
		$('.list-unstyled li a').on('click', function(){
			var page = $(this).attr('href');
			$('#content').load(page);
			return false;
		});
	});

	document.getElementById('addBookButton').addEventListener('click', function() {
		document.getElementById('formContainer').classList.toggle('active');
	});

	document.querySelector('.overlay').addEventListener('click', function() {
		document.getElementById('formContainer').classList.remove('active');
	});

	document.getElementById('book_image').addEventListener('change', function(e) {
		var fileName = e.target.files[0].name;
		e.target.nextElementSibling.textContent = fileName;
	});

})(jQuery);
