(function ($){
	$(document).ready(function (){
		var $container        = $('.sgsocial');
		var $loaders          = $('.sgsocial-loader:not(".loaded")');
		var $buttonsContainer = $('.sgsocial-buttons');

		var win = $(window);

		$container.show();
		Socialite.setup(sgSocial.socialiteSettings);
		var loadEvent = sgSocial.loadEvent;

		function isVisible(elem) {
			var viewport_top = win.scrollTop()
			var viewport_height = win.height()
			var viewport_bottom = viewport_top + viewport_height
			var $elem = $(elem)
			var top = $elem.offset().top
			var height = $elem.height()
			var bottom = top + height

			return (top >= viewport_top && top < viewport_bottom) ||
			       (bottom > viewport_top && bottom <= viewport_bottom) ||
			       (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
		}

		function loadSocialite(elem)
		{
			$(elem).addClass('loaded');
			$loaders.remove();
			Socialite.load($(elem));
			$buttonsContainer.fadeIn();
		}

		function loadVisibleLoaders()
		{
			$loaders.each(function(){
				if (isVisible(this)) {
					loadSocialite($buttonsContainer);
				}
			});
		}

		if (loadEvent == 'scroll') {
			loadVisibleLoaders();

			win.scroll(function() {
				loadVisibleLoaders();
			});
		} else {
			$loaders.one('hover', function(e){
				loadSocialite($buttonsContainer);
			});
		}
	});
})(jQuery);