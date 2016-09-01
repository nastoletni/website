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