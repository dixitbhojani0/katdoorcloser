<script src="<?=SITEURL?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?=SITEURL?>assets/js/bootstrap.min.js"></script>

<!-- <script src="<?=SITEURL?>assets/js/jquery-3.3.1.min.js"></script> -->
<!-- <script src="<?=SITEURL?>assets/global/plugins/jquery.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- disable body scroll which navbar is in active -->

<!--//-->
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!--/scroll-down-JS-->
<script type="text/javascript">
  $(window).scroll(function() {
  if ($(this).scrollTop() > 120){
  $('.top-headerhny').removeClass('slideIn animated');
  $('.top-headerhny').addClass("sticky_header slideInDown animated");
  }
  else{
  $('.top-headerhny ').removeClass('sticky_header slideInDown animated');
  $('.top-headerhny ').addClass('slideIn animated');
  }
  });
</script>
<!--pop-up-box-->
<script src="<?=SITEURL?>assets/js/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function () {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,	

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom'
		});
	});
</script>
<!--//pop-up-box-->
<!-- for blog carousel slider -->
<script src="<?=SITEURL?>plugins/owl.carousel-2/owl.carousel.min.js"></script>
<script>
	$(document).ready(function () {
		/*$("#owl-demo2").owlCarousel({
			items: 1,
			lazyLoad: true,
			autoPlay: true,
			navigation: false,
			navigationText: ["", ""],
			rewindNav: false,
			scrollPerPage: true,
			pagination: false,
			paginationNumbers: false,

		})*/
		var owl = $('#owl-demo2');
		owl.owlCarousel({
		    items:1,
		    loop:true,
		    margin:10,
		    autoplay:true,
		    autoplayTimeout:5000,
		    autoplayHoverPause:false
		});
		/*$('.play').on('click',function(){
		    owl.trigger('play.owl.autoplay',[1000])
		})
		$('.stop').on('click',function(){
		    owl.trigger('stop.owl.autoplay')
		})*/
	});
	$(document).ready(function () {
		$("#owl-demo1").owlCarousel({
			loop: true,
			margin: 20,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 2,
					nav: false
				},
				1000: {
					items: 3,
					nav: true,
				}
			},
			autoplay:true,
		    autoplayTimeout:2000,
		    autoplayHoverPause:true
		})
	})
	$(document).ready(function () {
		$("#owl-demo4").owlCarousel({
			loop: true,
			margin: 20,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 2,
					nav: false
				},
				1000: {
					items: 3,
					nav: true,
				}
			},
			autoplay:true,
		    autoplayTimeout:2000,
		    autoplayHoverPause:true
		})
	})
</script>
<!-- <script src="<?=SITEURL?>assets/js/bootstrap.min.js"></script> -->
<!--/MENU-JS-->
<!-- <script src="<?=SITEURL?>assets/js/jquery-2.1.4.min.js"></script> -->
<!-- js for portfolio lightbox -->
<script src="<?=SITEURL?>assets/js/jquery.chocolat.js "></script>
<!--light-box-files -->
<script type="text/javascript">
    $(function () {
        $('.w3_agile_portfolio_grid a').Chocolat();
    });
</script>
<!-- /js for portfolio lightbox -->
<!-- for blog carousel slider -->
<script src="<?=SITEURL?>assets/js/owl.carousel1.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo3").owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    })
</script>

<!-- ======= Touch Swipe =========-->
<script src="<?=SITEURL?>assets/js/jquery.touchSwipe.min.js"></script>
<!-- ======= Customize =========-->
<script src="<?=SITEURL?>assets/js/responsive_bootstrap_carousel.js"></script>
<script src="<?=SITEURL?>assets/js/custom.js"></script>
<script src="<?=SITEURL?>assets/js/theme.js"></script>	
<script src="<?=SITEURL?>admin/js/toastr.js"></script>
<script src="<?=SITEURL?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>