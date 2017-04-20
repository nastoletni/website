<article <?php post_class( 'panel' ); ?>>
    <header class="panel-header">
        <h3 class="panel-header-title"><?php the_title(); ?></h3>
    </header>
<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php echo get_permalink(); ?>" class="panel-image"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
<?php endif; ?>
    <div class="panel-content">
        <?php the_content(); ?>
    </div>
</article>