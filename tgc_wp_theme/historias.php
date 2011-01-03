<?php while (have_posts ()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="tiulo"><?php the_title() ?></div>
        <div class="autor"><?php the_author() ?></div>
        <div class="fecha"><?php the_time('F jS, Y') ?></div>
        <div class="lugar"><?php echo get_post_meta($post->ID, 'lugar', true) ?></div>
        <div class="entry"><?php the_content(); ?></div>
    </div>

<?php endwhile; ?>
