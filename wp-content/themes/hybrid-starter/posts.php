<?php
/**
 * Template Name: Posts Page
 */

get_header();
?>

<main class="posts-page">
	<div class="container">
		<h1><?php _e( 'Recent Posts', 'hybrid-starter' ); ?></h1>

		<?php
		$query = new WP_Query( array(
			'posts_per_page' => 3,
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<article class="post-item">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="post-meta">
						<span><?php echo get_the_date(); ?></span>
					</div>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			?>
			<p><?php _e( 'No posts found.', 'hybrid-starter' ); ?></p>
			<?php
		endif;
		?>
	</div>
</main>

<?php
get_footer();