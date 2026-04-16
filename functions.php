<?php
/**
 * Theme setup and asset loading.
 *
 * @package Hybrid_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HYBRID_STARTER_VERSION', '0.1.7' );

/**
 * Register theme features.
 */
function hybrid_starter_setup(): void {
	load_theme_textdomain( 'hybrid-starter', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 96,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
	add_action( 'after_setup_theme', function() {
		add_theme_support( 'align-wide' );
	} );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hybrid-starter' ),
		'footer'  => __( 'Footer Menu', 'hybrid-starter' ),
	) );
}
add_action( 'after_setup_theme', 'hybrid_starter_setup' );

/**
 * Load front-end assets.
 */
function hybrid_starter_enqueue_assets(): void {
	wp_enqueue_style(
		'hybrid-starter-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		HYBRID_STARTER_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'hybrid_starter_enqueue_assets' );

/**
 * Keep excerpt links readable.
 */
function hybrid_starter_excerpt_more(): string {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'hybrid_starter_excerpt_more' );

/**
 * Sanitize an admin link shortcode URL.
 */
function hybrid_starter_sanitize_admin_link_url( string $url ): string {
	$url = trim( $url );

	if ( '' === $url || preg_match( '/[\x00-\x1F\x7F]/', $url ) ) {
		return '';
	}

	if ( str_starts_with( $url, '/' ) && ! str_starts_with( $url, '//' ) ) {
		return esc_url( $url );
	}

	return esc_url( $url, array( 'http', 'https' ) );
}

/**
 * Render an admin-only link.
 *
 * Usage: [admin-link url="/wp-admin/" label="Admin Dashboard" class="admin-only-link"]
 */
function hybrid_starter_admin_link_shortcode( array $atts ): string {
	if ( ! current_user_can( 'manage_options' ) ) {
		return '';
	}

	$atts = shortcode_atts(
		array(
			'url'   => '/wp-admin/',
			'label' => __( 'Admin Dashboard', 'hybrid-starter' ),
			'class' => 'admin-only-link',
		),
		$atts,
		'ADMIN-LINK'
	);

	$url = hybrid_starter_sanitize_admin_link_url( (string) $atts['url'] );

	if ( '' === $url ) {
		return '';
	}

	return sprintf(
		'<a class="%3$s" href="%1$s">%2$s</a>',
		$url,
		esc_html( $atts['label'] ),
		esc_attr( $atts['class'] )
	);
}
add_shortcode( 'ADMIN-LINK', 'hybrid_starter_admin_link_shortcode' );
add_shortcode( 'admin-link', 'hybrid_starter_admin_link_shortcode' );
