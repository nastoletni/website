<aside class="sidebar">
    <section class="panel">
        <header class="panel-header">
            <h2 class="panel-heading">Kategorie</h2>
        </header>
        <div class="panel-content">
            <ul>
    <?php
    $categories = get_categories();

    foreach ( $categories as $category ) : ?>
                <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></li>
    <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <iframe src="https://discordapp.com/widget?id=212676714352869376&amp;theme=light" class="discord-iframe" height="500" allowtransparency="true" frameborder="0"></iframe>
</aside>