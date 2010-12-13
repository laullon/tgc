<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior">
        <?php the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="fecha">
                <?php the_time('F jS, Y') ?>
            </div>
            <div class="lugar">lugar</div>
            <div class="entry">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
