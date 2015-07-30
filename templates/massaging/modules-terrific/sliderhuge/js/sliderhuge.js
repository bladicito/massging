(function($) {
	'use strict';



	Tc.Module.Sliderhuge = Tc.Module.extend({

		/**
		 * Initialize.
		 *
		 * @method init
		 * @return {void}
		 * @constructor
		 * @param {jQuery} $ctx the jquery context
		 * @param {Sandbox} sandbox the sandbox to get the resources from
		 * @param {Number} id the unique module id
		 */
		init: function($ctx, sandbox, id) {
			// call base constructor
			this._super($ctx, sandbox, id);

			// Do stuff here
			//...
		},

		/**
		 * Hook function to do all of your module stuff.
		 *
		 * @method on
		 * @param {Function} callback function
		 * @return void
		 */
		on: function(callback) {
			var mod = this,
				$ctx = this.$ctx
            ;

			$('.slider-holder').slick({
				infinite: true,
				speed: 700,
				slidesToShow: 1,
				slidesToScroll: 1,
				slide: 'div',
				dots: true,
				appendDots: $('.slider-dots--holder'),
                arrows: false,
				autoplay: true,
				autoplaySpeed: 3000,
				centerMode: false,
				adaptiveHeight: true,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							infinite: true
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow:1,
							slidesToScroll: 1,
							centerMode: false,
							arrows: false
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							centerMode: false,
							arrows: false
						}
					}
				]
			});




			callback();
		},







		/**
		 * Hook function to trigger your events.
		 *
		 * @method after
		 * @return void
		 */
		after: function() {
			// Do stuff here or remove after method
			//...
		}

	});

})(Tc.$);
