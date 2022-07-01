(function ($) {
	$(document).ready(function () {
		/* owlcarousel */
		if ($(".owl-carousel.banner-home").length) {
			$(".owl-carousel.banner-home").each(function () {
				// var owl = $(".owl-carousel");
				$(this).owlCarousel({
					items: 1,
					loop: true,
					margin: 24,
					autoplay: true,
					autoplayTimeout: 4000,
					autoplayHoverPause: true
				});
			});
		}

		if ($(".owl-carousel.mentor-home").length) {
			$(".owl-carousel.mentor-home").each(function () {
				// var owl = $(".owl-carousel");
				$(this).owlCarousel({
					items: 1,
					loop: true,
					margin: 24,
					dots: false,
					nav: true,
					autoplay: true,
					autoplayTimeout: 4000,
					autoplayHoverPause: true
				});
			});
		}

		if ($(".owl-carousel.mentor-introduce").length) {
			$(".owl-carousel.mentor-introduce").each(function () {
				// var owl = $(".owl-carousel");
				$(this).owlCarousel({
					items: 4,
					loop: true,
					margin: 24,
					dots: false,
					nav: true,
					autoplay: true,
					autoplayTimeout: 4000,
					autoplayHoverPause: true,
					responsive: {
						0: {
							items: 3,
						},
						768: {

						}
					},
				});
			});
		}
		if ($(".owl-carousel.highlight-sources").length) {
			$(".owl-carousel.highlight-sources").each(function () {
				// var owl = $(".owl-carousel");
				$(this).owlCarousel({
					items: 4,
					loop: true,
					margin: 24,
					dots: false,
					nav: true,
					autoplay: true,
					autoplayTimeout: 4000,
					autoplayHoverPause: true,
					responsive: {
						0: {
							items: 3,
						},
						768: {

						}
					},
				});
			});
		}

		if ($(".owl-carousel.comment-home").length) {
			$(".owl-carousel.comment-home").each(function () {
				// var owl = $(".owl-carousel");
				$(this).owlCarousel({
					items: 3,
					loop: true,
					margin: 24,
					autoplay: true,
					autoplayTimeout: 4000,
					autoplayHoverPause: true
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
