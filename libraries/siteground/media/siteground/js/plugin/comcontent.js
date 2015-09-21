(function($){
	$(document).ready(function () {

		function hideFields(mode) {
			$('.js-siteground-plugin-comcontent-mode-' + mode).closest('.control-group').fadeOut();
		}

		function showFields(mode) {
			$('.js-siteground-plugin-comcontent-mode-' + mode).closest('.control-group').fadeIn();
		}

		$('#jform_params_mode').change(function(){
			var activeMode = $(this).val();

			switch (activeMode) {
				case 'exclude':
					hideFields('include');
					showFields('exclude');
					break;
				default:
					hideFields('exclude');
					showFields('include');
					break;
			}

		});

		$('#jform_params_mode').trigger('change');
	});
})(jQuery);