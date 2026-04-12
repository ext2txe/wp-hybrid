<?php
/**
 * Archive template.
 *
 * @package Hybrid_Starter
 */

get_header();
?>

<section class="content-section">
	<div class="content-section__inner">
		<header class="archive-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="post-list">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'parts/content', get_post_type() );
				endwhile;
				?>
			</div>

			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();

