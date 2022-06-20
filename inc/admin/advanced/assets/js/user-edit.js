(function ($) {
	$(document).ready(function () {
		var columnSelected = $("label.selected input[value='1']").closest(
			".acf-row"
		);

		columnSelected.css({
			"pointer-events": "none",
			filter: "opacity(0.4)",
		});
	});
})(jQuery);
