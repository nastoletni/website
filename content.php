<article <?php post_class( 'panel' ); ?>>
    <header class="panel-header">
        <h3 class="panel-header-title">
<?php if ( is_single() ) : ?>
            <?php the_title(); ?>
<?php else : ?>
            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; ?>
        </h3>
        <ul class="panel-header-meta">
            <li>w <?php the_category( ', ' ); ?></li>
            <li>przez <?php the_author_posts_link(); ?></li>
            <li><time datetime="<?php the_time('Y-m-d\TH:i:s'); ?>">dnia <?php the_time( get_option( 'date_format' ) ); ?></time></li>
        </ul>
    </header>
<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php echo get_permalink(); ?>" class="panel-image"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
<?php endif; ?>
    <div class="panel-content">
        <?php the_content( 'Czytaj dalej →' ); ?>
    </div>
<?php if ( is_single() ) : ?>
    <section class="bio">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>
        <h3 class="bio-title"><?php the_author(); ?></h3>
<?php if ( '' === get_the_author_meta( 'description' ) ) : ?>
        <p class="blank">Ten autor jeszcze nie podzielił się czymś o sobie.</p>
<?php else : ?>
        <p><?php the_author_meta( 'description' ); ?></p>
<?php endif; ?>
        <p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">Zobacz wszystkie posty tego autora →</a></p>
    </section>
    <section class="comments">
        <h3>Komentarze</h3>
        <?php comments_template(); ?>
    </section>
<?php endif; ?>
</article>