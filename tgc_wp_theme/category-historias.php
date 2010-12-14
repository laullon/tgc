<?php
get_header();
$i = 0;
$class = array("der", "izq");
?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior">
        <div id="historias" class="clearfix">
            <?php while (have_posts ()) : the_post();
                $i = 1 - $i ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class($class[$i]); ?>>
                    <div class="fecha">
                    <?php the_time('F jS, Y') ?>
                </div>
                <div class="lugar">fecha</div>
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
                    </div>
                </div>
<?php get_footer(); ?>