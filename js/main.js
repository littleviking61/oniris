jQuery.noConflict(false);
$ = jQuery;

$(document).ready(function(){

		var $isotop = $('.isotop');
		
		$isotop.imagesLoaded( function() {
			$isotop.isotope({
				// options
				itemSelector: '.container',
				layoutMode: 'masonry'
			}).velocity("fadeIn", { duration: 400 });

		});

		$('aside.main').nav();

		// var $fotoramaDiv = $('.fotorama-special').clone().appendTo('body').fotorama();
		// var fotorama = $fotoramaDiv.data('fotorama');

		// $('a.thickbox', '.fotorama-special').click( function(e){
		// 	e.preventDefault();

		// 	fotorama
		// 		.show($(this).index())
		// 		.requestFullScreen();
		// });
		// 
		// jQuery.ajax({
		// 	type: 'POST',
		// 	url: '/wp-admin/admin-ajax.php',
		// 	data: {
		// 		action: 'get_gallery', // the PHP function to run
		// 		gallery_id : 5
		// 	},
		// 	success: function(data, textStatus) {
		// 		console.log(data);
		// 	}
		// });

		$('a[href="#show-gallery"]').magnificPopup({
			type: 'ajax',
			ajax: {
				settings: {
					url: '/wp-admin/admin-ajax.php',
					type: 'post'
				}
			},
			callbacks: {
				elementParse: function() {
					this.st.ajax.settings.data = {
						action: 'get_gallery',
						galleryId: this.st.el.attr('data-gallery-id'),
						gallery: window[this.st.el.attr('data-gallery-img')],
						index: this.st.el.attr('data-index')
					};
				},
				ajaxContentAdded: function() {
					// Ajax content is loaded and appended to DOM
					$modal = this.content;

					$('.fotorama-ajax', $modal).fotorama({
						height: this.container.height() - 140
					}); 
				}
			}
		});
});

(function() {
	$.fn.nav = function() {

		var 
			duration = 400,
			easing = 'easeOutQuart',
			mouseIn = false,
			mouseTimeout = 'abcd';

		return this.each(function() {
			var
				self = this,
				$self = $(this),
				ul = $('ul.nav-section', $self),
				subLis = $('>li', ul),
				subLinks = $('>a:first-of-type', subLis),
				subLinkUls = $('>ul', subLis);

			subLinks.click(function(e){

				if(!mouseIconHover){
					e.preventDefault();
					if (!$(this).next().hasClass('open')) {
						subLinkUl = $(this).next('ul');

						subLinkUls.filter('.open').removeClass('open').velocity("slideUp", { delay: 50, duration: 200 });
						subLinkUl.addClass('open').velocity("slideDown", { duration: 200 });
					}
				}

			}).mousemove(function(e){
				mouseIconHover = this.offsetWidth - (e.pageX - this.offsetLeft) <= 30;
				$(this).toggleClass('icon-hover', mouseIconHover);
			});

			// $('i', subLinks).hover(function(){
			// 	console.log('test');
			// });

			$self.mouseenter(function(){
				mouseIn = true;
			});

			$self.mouseleave(function(){
				mouseIn = false;
				if(mouseTimeout == 'abcd') clearTimeout(mouseTimeout);
				mouseTimeout = setTimeout(checkMouseLeave, 2000);
			});

			function checkMouseLeave() {
				if(!mouseIn) {
					subLis.not('.current').children('ul').removeClass('open').velocity("slideUp", { delay: 50, duration: 200 });
					subLis.filter('.current').children('ul:not(.open)').addClass('open').velocity("slideDown", { duration: 200 });
				}
			}

			function init() {
				current = $('> li.current', ul);
				if (current.length > 0) {
					$('> ul', current).addClass('open');
				}else{
					subLis.first().addClass('current').children('ul').addClass('open').velocity("slideDown", { duration: 200 });
				}
			}

			init();

		});
	};
})(jQuery);

