/**
 * Created by VOOV Ltd.
 * User: Daniel Fekete
 * Date: 2011.05.22.
 * Time: 16:32
 */

(function($) {
	$.fn.titleover = function() {
		return this.each(function() {
			var $this = $(this);
			$this.val($this.attr('title'));


			$this.focus(function(){
				if($this.val() == $this.attr('title')) {
					$this.val("");
				}
			});

			$this.blur(function(){
				if($this.val() == '') {
					$this.val($this.attr('title'));
				}
			});
		});
	}
})(jQuery);
