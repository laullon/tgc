<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior clearfix">
        <div id="pagina">
            <?php the_post(); ?>
            <h1><?php the_title() ?></h1>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="fecha">
                    <?php the_time('F jS, Y') ?>
                </div>
                <div class="tarjeta">Trajeta: <a href="/tarjeta/<?php echo get_post_meta($post->ID, 'tarjeta', true) ?>"><?php echo get_post_meta($post->ID, 'tarjeta', true) ?></a></div>
                <div class="lugar"><?php echo get_post_meta($post->ID, 'lugar', true) ?></div>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php get_sidebar( ); ?>
                </div>
            </div>
<?php get_footer(); ?>
