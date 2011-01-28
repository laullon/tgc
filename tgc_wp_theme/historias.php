<?php $s=Array("par","inpar"); $c=0; while (have_posts ()) : the_post(); $c=1-$c ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class("historia seccion {$s[$c]}"); ?>>
        <p><a href="<?php the_permalink() ?>"><?php the_title() ?></a></p>
        <div class="texto"><?php the_excerpt(); ?></div>
        <p class="fecha"><?php the_time('F jS, Y') ?>, <?php echo get_post_meta($post->ID, 'lugar', true) ?></p>
    </div>
<?php endwhile; ?>
