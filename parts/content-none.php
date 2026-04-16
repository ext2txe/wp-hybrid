<?php
/**
 * Empty result content.
 *
 * @package Hybrid_Starter
 */
?>

<article class="entry">
	<header class="entry-header">
		<h1 class="entry-title"><?php esc_html_e( 'Nothing found', 'hybrid-starter' ); ?></h1>
	</header>
	<div class="entry-content">
		<p><?php esc_html_e( 'Try a search or check back soon.', 'hybrid-starter' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</article>

