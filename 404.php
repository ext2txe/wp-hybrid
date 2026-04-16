<?php
/**
 * 404 template.
 *
 * @package Hybrid_Starter
 */

get_header();
?>

<section class="content-section">
	<div class="content-section__inner">
		<article class="entry">
			<header class="entry-header">
				<h1 class="entry-title"><?php esc_html_e( 'Page not found', 'hybrid-starter' ); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php esc_html_e( 'Try a search or head back to the homepage.', 'hybrid-starter' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	</div>
</section>

<?php
get_footer();

