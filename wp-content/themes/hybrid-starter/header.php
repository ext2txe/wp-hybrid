<?php
/**
 * Site header.
 *
 * @package Hybrid_Starter
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'hybrid-starter' ); ?></a>

<header class="site-header">
	<div class="site-header__inner">
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			}
			?>
			<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div>

		<nav class="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'hybrid-starter' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'fallback_cb'    => false,
				'menu_class'     => 'site-navigation__menu',
			) );
			?>
		</nav>
	</div>
</header>

<main id="site-content" class="site-main">

