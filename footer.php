<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package julianablumenschein
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="section-content centered">
            <div class="footer-col left">
                <div id="social-menu-footer">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-2',
                        'menu_id'        => 'social-menu',
                    ) );
                    ?>
                </div>
                <div id="corporate-menu-footer">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-3',
                        'menu_id'        => 'corporate-menu',
                    ) );
                    ?>
                </div>
            </div>
            <div class="footer-col middle">
                <div class="logo">
                <?php
                if ( is_front_page() ) : //( is_front_page() || is_home() )
                ?>
                    <a href='#start' rel='home'><h1 class='site-title site-title-home'><?php bloginfo( 'name' ); ?></h1></a>
                <?php
                else:
                ?>
                    <a href='<?php echo get_home_url(); ?>' rel='home'><h1 class='site-title site-title-nohome'><?php bloginfo( 'name' ); ?></h1></a>
                <?php
                endif;
                ?>
                <p>© 2019 Juliana Blumenschein</p>
                </div>
            </div>
            <div class="footer-col right">
                <div id="primary-menu-footer">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-4',
                        'menu_id'        => 'primary-footer',
                    ) );
                    ?>
                </div>
            </div>
        </div>    
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
$(document).ready(function($){
    $('.menu-social-menu-container a').attr('target','_blank');
    
    $('#primary-menu .menu-item a, .logotop.home a, .home #primary-menu-footer a, .home .footer-col.middle a').click(function(event){		
        event.preventDefault();
        $('html,body').animate({scrollTop : $(this.hash).offset().top}, 1000);
    });
    
    $('.band:first-of-type, .band-thumbnail-wrap:first-of-type').addClass('active');
    $('#bands-container').height($('.band.active').outerHeight());
    

    
    if ($(window).width() < 1250){
		if (!$('body').hasClass('home')){
			$('.menu-hauptmenu-container').addClass('lower');
			$('#site-navigation').css({'background':'rgba(16,25,22,0.8)'});
		}
        $('.menu-hauptmenu-container').css({display:'none'});  
        $('.menu-toggle').click(function(){
            if ($('.menu-hauptmenu-container').hasClass('open')){
                $('.menu-hauptmenu-container').fadeOut(600).removeClass('open');
                $('.menu-toggle').removeClass('open');
                $('header .menu-social-menu-container').fadeOut(600).removeClass('open');
                $('header .menu-woocommerce-container').fadeOut(600).removeClass('open');
                $('body').css({
                    'overflow': 'initial'
                });
            } else {
                $('.menu-hauptmenu-container').fadeIn(600).addClass('open');
                $('.menu-toggle').addClass('open');
                $('header .menu-social-menu-container').fadeIn(600).addClass('open');
                $('header .menu-woocommerce-container').fadeIn(600).addClass('open');
                $('body').css({
                   'overflow': 'hidden'
                });
            }
    	});
        $('.menu-item, .logotop.home a').click(function(){
            $('.menu-hauptmenu-container').fadeOut(600).removeClass('open');
            $('.menu-toggle').removeClass('open');
            if ($('header .menu-social-menu-container').hasClass('open')){
                $('header .menu-social-menu-container').fadeOut(600).removeClass('open');
            };
            if ($('header .menu-woocommerce-container').hasClass('open')){
                $('header .menu-woocommerce-container').fadeOut(600).removeClass('open');
            };
            $('body').css({
                'overflow': 'initial'
            });
        });
    }else{}
	
	
	$('.logotop.home').css({display:'none'});
	$(window).scroll(function() {
		if ($(window).scrollTop() > 0) {
			$('.title-cont .site-title.site-title-home').fadeOut(600);
			$('.logotop.home, .logotop.home a, .logotop.home a h1.site-title-home').fadeIn(600);
			if ($(window).width() < 1280){
				if (!$('.menu-hauptmenu-container').hasClass('lower')){
					$('.menu-hauptmenu-container').addClass('lower');
				}
				if (!$('#site-navigation').hasClass('dark-bg')){
					$('#site-navigation').addClass('dark-bg');
				}
			}
		} else {
			$('.title-cont .site-title.site-title-home').fadeIn(600);
			$('.logotop.home').fadeOut(600);
			if (($('.menu-hauptmenu-container').hasClass('lower')) && ($('body').hasClass('home'))){
				$('.menu-hauptmenu-container').removeClass('lower');
			}
			if ($('#site-navigation').hasClass('dark-bg')){
				$('#site-navigation').removeClass('dark-bg');
			}
		}
	});
    
        if ($(window).width() > 1279){
            var bandImgWidth = $('.single-band-thumbnail-wrap').width();
            $('.single-band-thumbnail-wrap').css({'height': bandImgWidth*0.65});
        };
    
    function setDouble(){
        $('.band .band-text').each(function(){
        if (($(this).find('figure').length >= 2) && ($(window).width() > 1279) && !($(this).find('figure').hasClass('double'))){
            $(this).find('figure').addClass('double');
        }});
        /*else {
            $('.band-text figure').removeClass('double');
        };*/
    }
    setDouble();
    $('.band-thumbnail-wrap').click(function(){
        if ($('.band-thumbnail-wrap').hasClass('active')){
            $('.band-thumbnail-wrap').removeClass('active');
        };
        $(this).addClass('active');
        var index = $('.band-thumbnail-wrap').index(this);
        console.log('index:' + index);
        $('.band.active').fadeOut(600).removeClass('active');
        $('.band:eq('+index+')').fadeIn(600).addClass('active');
        $('#bands-container').height($('.band.active').outerHeight());
        setDouble();
    });
    
    if($(window).width() > 1024){
        $('#bands-container').height($('.band.active').outerHeight());
    } else{
        $('#bands-container').css({height: 'auto'});
    }
    if ($('.single-post').length){
        var footerMenuLink = 0;
        $('.single-post #primary-menu-footer a').each(function() {
            footerMenuLink = $(this).attr('href').split("#").pop();
            $(this).attr('href','https://julianablumenschein.de/#' + footerMenuLink);
        });  
    };
});


// Display "Item in Cart" Badge

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var username = getCookie("woocommerce_items_in_cart");
  if (username != "") {
   console.log("Item in cart");
   $('#woocommerce-menu li').addClass('active');
  } else {
    console.log("NO Item in cart");
  }
}
checkCookie();
</script>
</body>
</html>

