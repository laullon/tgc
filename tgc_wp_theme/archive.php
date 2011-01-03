<?php get_header();
$i = 1; ?>
<div id="cuerpo" class="exterior clearfix">
    <div id="archivo" class="interior clearfix">
        <div id="pagina">
            <div id="historias" class="clearfix">
                <?php while (have_posts ()) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" class="post">
                        <h1><?php the_title() ?></h1>
                        <div class="meta" class="clearfix">
                            <div class="fecha"><?php the_date() ?></div>
                            <div class="lugar"><?php echo get_post_meta($post->ID, 'lugar', true) ?></div>
                            <div class="tarjeta">Trajeta: <a href="/tarjeta/<?php echo get_post_meta($post->ID, 'tarjeta', true) ?>"><?php echo get_post_meta($post->ID, 'tarjeta', true) ?></a></div>
                        </div>
                        <div class="entry"><?php the_content(); ?></div>
                    </div>
                <?php endwhile ?>
                </div>
            <?php if ($wp_query->max_num_pages > 1) : ?>
                        <div id="nav-below" class="navigation">
                            <div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts'); ?></div>
                            <div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>'); ?></div>
                        </div><!-- #nav-below -->
            <?php endif; ?>
                    </div>            <?php get_sidebar( ); ?>
                </div>
            </div>
<?php get_footer(); ?>