<?php
/**
 * Site footer.
 *
 * @package Hybrid_Starter
 */
?>
</main>

<footer class="site-footer">
	<div class="site-footer__inner">
		<p>
			<?php
			printf(
				esc_html__( '%1$s %2$s', 'hybrid-starter' ),
				'&copy;',
				esc_html( date_i18n( 'Y' ) . ' ' . get_bloginfo( 'name' ) )
			);
			?>
		</p>
		<nav aria-label="<?php esc_attr_e( 'Footer navigation', 'hybrid-starter' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
				'fallback_cb'    => false,
				'menu_class'     => 'site-footer__menu',
			) );
			?>
		</nav>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

