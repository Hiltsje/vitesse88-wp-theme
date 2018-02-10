(function( root, $, undefined ) {
	"use strict";

	$(function () {

		$("#mobile-nav-button").click(function() {
			$(this).toggleClass("open");
			$("header, .mobile-nav-container").toggleClass("open");
		});
		
	});

} ( this, jQuery ));