(function ($) {
	$(document).ready(function () {
		/* owlcarousel */
		if ($(".owl-carousel").length) {
			$(".owl-carousel").each(function () {
				// var owl = $(".owl-carousel");
				$(this).owlCarousel({
					margin: 0,
					autoplayTimeout: $(this).data("autotime"),
					smartSpeed: $(this).data("speed"),
					autoHeight: $(this).data("autoheight"),
					autoplay: $(this).data("autoplay"),
					items: $(this).data("carousel-items"),
					nav: $(this).data("nav"),
					dots: $(this).data("dots"),
					center: $(this).data("center"),
					loop: $(this).data("loop"),

					responsive: {
						0: {
							items: $(this).data("mobile"),
							autoplay: true
						},
						768: {
							items: $(this).data("tablet"),
						},
						992: {
							items: $(this).data("desktop-small"),
						},
						1680: {
							items: $(this).data("desktop"),
						},
					},
				});
			});
		}

		/* AOS Animate */
		AOS.init({ once: true });

		/* Show menu mobile */
		$("#mobile-menu-button").click(function () {
			$(this).toggleClass("active");
			$(".header-menu").toggleClass("active");
		});
	});

	// scroll effect header , bottomToTop , Btn-call
	window.onscroll = function () {
		myFunction();
	};
	var toTop = document.getElementById("bottom_to_top");
	function myFunction() {
		// console.log(this.scrollY);
		if (this.scrollY > 100) {
			toTop.style.bottom = "30px";
		} else {
			toTop.style.bottom = "-100px";
		}
		this.oldScroll = this.scrollY;
	}
})(jQuery);
