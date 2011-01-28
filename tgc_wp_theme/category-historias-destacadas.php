<?php get_header();
$i = 1; ?>
<div id="cuerpo" class="exterior clearfix">
    <div id="archivo" class="interior clearfix">
        <div id="pagina" class="corazon">
            <h1>Historias Destacadas</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tempor hendrerit sem. Sed quam purus, lacinia in volutpat id, imperdiet vel justo. Curabitur consequat pellentesque orci, at luctus erat hendrerit ac. </p>
            <div id="historias" class="clearfix">
                <?php while (have_posts ()) : the_post(); ?>
                <?php get_template_part("historia") ?>
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