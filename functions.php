<?php

function nastoletnitheme_setup() {
	load_theme_textdomain( 'nastoletnitheme' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menu( 'primary', 'Główne menu' );

	set_post_thumbnail_size( 1200, 300 );

	// add_editor_style( 'post-content.css' );
}

add_action( 'after_setup_theme', 'nastoletnitheme_setup' );

function nastoletnitheme_enqueue_script() {
	wp_enqueue_script( 'ga', get_template_directory_uri() . '/scripts/ga.js' );
}

add_action( 'wp_enqueue_scripts', 'nastoletnitheme_enqueue_script' );
add_action( 'login_enqueue_scripts', 'nastoletnitheme_enqueue_script' );

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

function nastoletnitheme_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'ad_placeholder', array(
		'default' => true
	) );
	$wp_customize->add_setting( 'ad_image', array(
		'default' => ''
	) );
	$wp_customize->add_setting( 'ad_href', array(
		'default' => ''
	) );

	$wp_customize->add_section( 'ad', array(
		'title' => 'Reklama',
		'priority' => 0
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'ad_placeholder_control',
		array(
			'label' => 'Placeholder reklamy',
			'description' => 'Ukrywa reklamę i pokazuje tekst "Miejsce na Twoją reklamę".',
			'section' => 'ad',
			'type' => 'checkbox',
			'settings' => 'ad_placeholder'
		)
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'ad_image_control',
		array(
			'label' => 'Obrazek reklamy',
			'section' => 'ad',
			'settings' => 'ad_image'
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'ad_href_control',
		array(
			'label' => 'Odnośnik reklamy',
			'section' => 'ad',
			'type' => 'url',
			'settings' => 'ad_href'
		)
	) );
}

add_action( 'customize_register', 'nastoletnitheme_customize_register' );

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
