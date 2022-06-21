(function ($) {
	$(document).ready(function () {
		/* owlcarousel */
		if ($(".owl-carousel").length) {
			$(".owl-carousel").each(function () {
				// var owl = $(".owl-carousel");
				$(this).owlCarousel({

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
