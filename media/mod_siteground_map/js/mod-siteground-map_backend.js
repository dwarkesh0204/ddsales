(function($){
	$(document).ready(function () {

		/**
		 * Hide fields through javascript
		 *
		 * @param   string  mode          Speficic selector of fields to hide
		 * @param   string  baseSelector  Prefix for selector
		 *
		 * @return  void
		 */
		function hideFields(mode, baseSelector) {
			$(baseSelector + '-' + mode).closest('.control-group').fadeOut();
		}

		/**
		 * Show fields through javascript
		 *
		 * @param   string  mode          Speficic selector of fields to show
		 * @param   string  baseSelector  Prefix for selector
		 *
		 * @return  void
		 */
		function showFields(mode, baseSelector) {
			$(baseSelector + '-' + mode).closest('.control-group').fadeIn();
		}

		// Mode selector
		$('#jform_params_mode').change(function(){
			var activeMode = $(this).val();
			var baseSelector = '.js-mod-siteground-map-mode.js-mod-siteground-map-mode';

			switch (activeMode) {
				case 'address':
					hideFields('coordinates', baseSelector);
					hideFields('iframe', baseSelector);
					showFields('address', baseSelector);
					break;
				case 'coordinates':
					hideFields('address', baseSelector);
					hideFields('iframe', baseSelector);
					showFields('coordinates', baseSelector);
					break;
				default:
					hideFields('coordinates', baseSelector);
					hideFields('address', baseSelector);
					showFields('iframe', baseSelector);
					break;
			}

		}).trigger('change');

		// Size selector
		$('#jform_params_size').change(function(){
			var activeMode = $(this).val();
			var baseSelector = '.js-mod-siteground-map-size.js-mod-siteground-map-size';

			switch (activeMode) {
				case 'fixed':
					showFields('fixed', baseSelector);
					break;
				default:
					hideFields('fixed', baseSelector);
					break;
			}

		}).trigger('change');
	});
})(jQuery);