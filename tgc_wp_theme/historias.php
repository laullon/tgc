<?php while (have_posts ()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="fecha">
        <?php the_time('F jS, Y') ?>
    </div>
        <div class="lugar">lugar</div>
    <div class="entry">
        <?php the_content(); ?>
    </div>
</div>

<?php endwhile; ?>
