<?php
/**
 * Single post template.
 *
 * @package Hybrid_Starter
 */

get_header();
?>

<section class="content-section">
	<div class="content-section__inner">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'parts/content', 'single' );

			the_post_navigation();

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
	</div>
</section>

<?php
get_footer();

