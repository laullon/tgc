<div id="post-<?php the_ID(); ?>" <?php post_class("historia"); ?>>
    <div class="cabecera clearfix">
        <h1 class="titulo"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
        <div class="meta">
            <p class="fecha">
                <?php the_time('F jS, Y') ?>
            </p>
            <p class="tarjeta">Tarjeta: <a href="/tarjeta/<?php echo get_post_meta($post->ID, 'tarjeta', true) ?>"><?php echo get_post_meta($post->ID, 'tarjeta', true) ?></a></p>
            <p class="lugar"><?php echo get_post_meta($post->ID, 'lugar', true) ?></p>
        </div>
    </div>
    <div class="texto"><?php is_single () ? the_content() : the_excerpt(); ?></div>
</div>
