(function( root, $, undefined ) {
	"use strict";

	$(function () {

		$("#mobile-nav-button").click(function() {
			$(this).toggleClass("open");
			$("header, .mobile-nav-container").toggleClass("open");
		});

		
		$( ".back-button" ).click(function() {
			event.preventDefault();
			window.history.back();
		  });


		
	});

} ( this, jQuery ));