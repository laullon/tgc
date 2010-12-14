<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header();
?>

<div id="cuerpo" class="exterior clearfix">
    <div class="interior clearfix">
        <?php while (have_posts ()) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <?php endwhile; ?>
        </div>
    </div>

<?php get_footer(); ?>
