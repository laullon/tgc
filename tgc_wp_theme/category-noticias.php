<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior clearfix">
        <div id="pagina">
        <div id="historias" class="clearfix">
            <?php while (have_posts ()) : the_post();
                $i = 1 - $i ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class('noticia'); ?>>
                    <h1><?php the_title() ?></h1>
                    <div class="fecha">
                    <?php the_time('F jS, Y') ?>
                </div>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </div>

            <?php endwhile; ?>
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