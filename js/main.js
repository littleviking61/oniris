jQuery.noConflict(false);
$ = jQuery;

$(document).ready(function(){

		var $isotop = $('.isotop');
		
		$isotop.imagesLoaded( function() {
			$listArticle = $isotop.isotope({
				// options
				itemSelector: '.container',
				layoutMode: 'masonry'
			});

			// store filter for each group
			var filters = {}, filterValue = [], qsRegex;

			$('.isotop-links a').click(function(e) {
				e.preventDefault();
			  var $this = $(this);
			  $this.toggleClass('check');
			  // get group key
			  var $buttonGroup = $this.parents('.isotop-links');
			  var filterGroup = $buttonGroup.attr('data-filter-group');
			  // set filter for group
			  if(filters[ filterGroup ] !== undefined){
			 		if($.inArray($this.attr('data-filter'),filters[ filterGroup ]) !== -1) {
			 			if(filters[ filterGroup ].length === 1) delete filters[ filterGroup ];
		 				else filters[ filterGroup ].splice($.inArray($this.attr('data-filter'),filters[ filterGroup ]), 1);
		 			}else filters[ filterGroup ].push($this.attr('data-filter'));
			  }else filters[ filterGroup ] = [$this.attr('data-filter')];

			  // combine filters
				filterValue = [];
			  if(filterGroup === 'all') {
					filters = {};
					$('.isotop-links a').toggleClass('check', true);
			  } else{
				  for ( var prop in filters ) {
				    filterValue.push(filters[ prop ]);
				  }
					$(':not('+filterValue.join(',')+')','.isotop-links').toggleClass('check', true);
				}

				if(filterValue.length === 0) {
					$('.isotop-links [href="#all"]').addClass('check');
				}else{
					$('.isotop-links [href="#all"]').removeClass('check');
				}

				// console.log(filterValue.join(','));
			  // set filter for Isotope
			  $isotop.isotope({ filter: ':not('+filterValue.join(',')+')' });
			});
		
		  // use value of search field to filter
		  var $quicksearch = $('#quicksearch').keyup( debounce( function() {
		  	qsRegex = new RegExp( $quicksearch.val(), 'gi' );
		  	if(qsRegex == '/(?:)/gi') $isotop.isotope({ filter: ':not('+filterValue.join(',')+')' });
		  	else{
			  	$isotop.isotope({
			  		filter: function() {
				      return qsRegex ? $(this).not(filterValue.join(',')).text().match( qsRegex ) : true;
				    }
			  	});		  		
		  	}
		  }, 200 ) );
		});

  

		$('aside.main').nav();

		$(".content .more").click(function(){
			$p = $(this).nextAll();
			if($(this).hasClass('view')) {
				$p.velocity("slideUp", { duration: 200, stagger:20 });
			}else{
				$p.velocity("slideDown", { duration: 200, stagger:20 });
			}
			$(this).toggleClass('view');
		});

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

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  };
}

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

