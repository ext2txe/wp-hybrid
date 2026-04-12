<?php
/**
 * Default content card.
 *
 * @package Hybrid_Starter
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--summary' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="entry-image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php echo esc_html( get_the_date() ); ?>
		</div>
	</header>

	<div class="entry-summary">
		<?php
		if ( is_home() || is_front_page() ) {
			the_content();
		} else {
			the_excerpt();
		}
		?>
	</div>
</article>
