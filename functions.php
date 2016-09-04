<?php

function nastoletnitheme_setup() {
	load_theme_textdomain( 'nastoletnitheme' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menu( 'primary', 'Główne menu' );

	set_post_thumbnail_size( 1200, 300 );

	add_editor_style( 'post-content.css' );
}

add_action( 'after_setup_theme', 'nastoletnitheme_setup' );

function nastoletnitheme_custom_login_logo() { ?>
	<style>
		#login h1 a, .login h1 a {
			background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/imgs/logo.svg');
			background-size: 168px;
			height: 148px;
			width: 168px;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'nastoletnitheme_custom_login_logo' );

function nastoletnitheme_custom_dashboard_widget_content() { ?>
	<a href="http://nastoletni.pl/wytyczne-dla-autorow" style="font-weight: bold; font-size: 2em;">Przeczytaj zanim zaczniesz pisać!</a>
<?php }

function nastoletnitheme_custom_dashboard_widget() {
	wp_add_dashboard_widget('dashboard_guidelines_widget', 'Wytyczne dla autorów', 'nastoletnitheme_custom_dashboard_widget_content');

	global $wp_meta_boxes;

	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	$custom_widget = array( 'dashboard_guidelines_widget' => $normal_dashboard['dashboard_guidelines_widget'] );
	unset( $normal_dashboard['dashboard_guidelines_widget'] );

	$wp_meta_boxes['dashboard']['normal']['core'] = array_merge( $custom_widget, $normal_dashboard );
}

add_action( 'wp_dashboard_setup', 'nastoletnitheme_custom_dashboard_widget' );