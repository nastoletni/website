<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="header" role="banner">
			<a href="<?php echo home_url(); ?>">
				<h1><?php echo str_replace( ' ', '<br>', get_bloginfo( 'name' ) ); ?></h1>
				<img src="<?php echo get_template_directory_uri(); ?>/imgs/logo.svg" alt="Logo Nastoletnich Programistów">
			</a>
		</header>
		<div class="codeline">
			<div>
				<code>
					<?php
						$codelines = array(
							'sf::RenderWindow <span style="color:#d14">window</span>(sf::VideoMode(<span style="color:#099">1920</span>, <span style="color:#099">955</span>), <span style="color:#d14">"nastoletni.pl - główna"</span>);',
							'$ <span style="color:yellow">sudo rm</span> <span style="color:gray">-rf --no-preserve-root</span> /'
						);

						echo $codelines[ array_rand( $codelines ) ];
					?>
				</code>
				<div class="fb-like"
					 data-href="https://www.facebook.com/nastoletnipl/"
					 data-layout="button_count"
					 data-action="like"
					 data-show-faces="false"
					 data-share="false"
				></div>
			</div>
		</div>
		<main class="main" role="main">
			<h2>Blog</h2>
			<nav class="nav">
				<h3>Kategorie</h3>
				<input type="checkbox" id="toggle-navigation" autocomplete="off">
				<label for="toggle-navigation">Rozwiń nawigację</label>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'depth' => 1
					) );
				?>
			</nav>
			<div class="posts">
				<?php if ( is_category() ) :
					$faq = new WP_Query( array(
						'post_type' => 'nastoletnitheme_faq',
						'meta_key' => 'category',
						'meta_value' => get_queried_object()->slug
					) );

					while ($faq->have_posts()) : $faq->the_post(); ?>
						<section class="faq">
							<a href="<?php echo get_permalink(); ?>">
								<h2><?php echo the_title(); ?></h2>
								<span>FAQ</span>
							</a>
						</section>
					<?php endwhile;
				endif;
				while ( have_posts() ) : the_post(); ?>
					<article <?php post_class(); ?>>
						<header>
							<h3>
								<?php if ( is_single() || is_page() ) :
									the_title();
								else : ?>
									<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
								<?php endif; ?>
							</h3>
							<?php if ( ! in_array(get_post_type(), array( 'page', 'nastoletnitheme_faq') ) ) : ?>
								<ul class="meta">
									<li>w <?php the_category(', '); ?></li>
									<li>przez <?php the_author_posts_link(); ?></li>
									<li><time datetime="<?php the_time(get_option('date_format')); ?>">dnia <?php the_time(get_option('date_format')); ?></time></li>
								</ul>
							<?php endif; ?>
						</header>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php echo get_permalink(); ?>" class="image"><img src="<?php the_post_thumbnail_url(); ?>"></a>
						<?php endif; ?>
						<div class="content">
							<?php the_content('Czytaj dalej &rarr;'); ?>
						</div>
						<?php if ( is_single() && get_post_type() == 'post' ) : ?>
							<section class="bio">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>
								<h3><?php the_author(); ?></h3>
								<?php if ( '' === get_the_author_meta( 'description' ) ) : ?>
									<p class="blank">Ten autor jeszcze nie podzielił się czymś o sobie.</p>
								<?php else : ?>
									<p><?php the_author_meta( 'description' ); ?></p>
								<?php endif; ?>
								<p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">Zobacz wszystkie posty tego autora &rarr;</a></p>
							</section>
							<section class="comments">
								<h3>Komentarze</h3>
								<?php comments_template(); ?>
							</section>
						<?php endif; ?>
					</article>
				<?php endwhile; ?>
			</div>
			<?php
				the_posts_pagination( array(
					'prev_text' => '&larr; Poprzednia',
					'next_text' => 'Następna &rarr;',
					'screen_reader_text' => 'Strony'
				) );
			?>
		</main>
		<section class="ad">
			<div>
				<?php if ( get_theme_mod( 'ad_placeholder' ) ): ?>
					<p class="placeholder">Miejsce na Twoją reklamę</p>
				<?php else: ?>
					<a href="<?php echo get_theme_mod( 'ad_href' ); ?>">
						<img src="<?php echo get_theme_mod( 'ad_image' ); ?>">
					</a>
				<?php endif; ?>
			</div>
		</section>
		<footer class="footer">
			<div>
				<p>&copy; nastoletni.pl, <?php echo date('Y'); ?></p>
				<ul>
					<li><a href="https://www.facebook.com/nastoletnipl">Fanpage</a></li>
					<li><a href="https://www.facebook.com/groups/NastoletniProgramisci">Grupa</a></li>
					<li><a href="https://m.me/albert.wolszon">Kontakt</a></li>
					<li><a href="https://github.com/nastoletni/website/issues/new">Zgłoś błąd</a></li>
					<li><a href="<?php echo admin_url(); ?>">Panel</a></li>
				</ul>
			</div>
		</footer>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans+Mono|Source+Sans+Pro:400,400i,700,700i&amp;subset=latin-ext">
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.5&appId=1217642934917968";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<?php wp_footer(); ?>
	</body>
</html>