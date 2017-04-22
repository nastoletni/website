<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i&amp;subset=latin-ext">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="hero-header-a" role="banner">
			<a href="<?php echo home_url(); ?>">
				<h1><?php echo str_replace( ' ', '<br>', get_bloginfo( 'name' ) ); ?></h1>
				<img src="<?php echo get_template_directory_uri(); ?>/imgs/logo.svg" alt="Logo Nastoletnich Programistów">
			</a>
		</header>
		<nav class="nav">
			<h3>Kategorie</h3>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'depth' => 1
				) );
			?>
		</nav>
		<div class="main main-container">
			<main role="main">