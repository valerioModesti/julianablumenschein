<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package julianablumenschein
 */

get_header();
?>

<div id="primary" class="content-area single-post">
	<main id="main" class="site-main">
		<!-- single -> looks for template-parts/content/<?php get_post_type(); ?> -->
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		//the_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		/*if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;*/

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<script>
	// $(window).on('load', function () {
	// 	setTimeout( function () {
	// 		$('#content img[class^="wp-image-"]').each(function () {
	// 			this.css('display', 'none');
	// 			console.log('this', this);
	// 			var source = this.attr('src');
	// 			console.log('src', source);
	// 			this.wrap('<a href="'+ source +'" data-lightbox="pressekit"></div>');
	// 		});

	// 		$.getScript('/wp-content/themes/julianablumenschein/lightbox2-2.11.3/dist/js/lightbox.js');

	// 		$('#content img[class^="wp-image-"]').css('display', 'initial');
	// 	}, 1000);
	// });

	document.onreadystatechange = () => {
  		if (document.readyState === 'complete') {
			let imgs = document.querySelectorAll('#content img[class^="wp-image-"]');
			console.log('imgs', imgs);
			imgs.forEach((element) => {
				console.log('element', element);
				element.style.display= 'none';
				let source = element.getAttribute('data-src');
				let anchor = document.createElement('a');
				anchor.href = source;
				anchor.setAttribute('data-lightbox', 'pressekit');
				element.parentNode.insertBefore(anchor, element);
				anchor.appendChild(element);
			});
		}
	};
</script>

<script>
	$(window).on('load', function () {
		$.getScript('/wp-content/themes/julianablumenschein/lightbox2-2.11.3/dist/js/lightbox.js');
		$('#content img[class^="wp-image-"]').css('display', 'initial');
	});
</script>

<?php
//get_sidebar();
get_footer();