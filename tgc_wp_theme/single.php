<?php get_header(); ?>
<?php the_post(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior clearfix">
        <div id="pagina">
            <? if (isset($wp_query->query_vars['tgc_gracias'])) : ?>
                <div class="gracias">
                    <h2>Gracias por enviar tu historia</h2>
                    <p class="tarjeta">Aparecerá en el historial de la tarjeta: <a href="/tarjeta/<?php echo get_post_meta($post->ID, 'tarjeta', true) ?>"><?php echo get_post_meta($post->ID, 'tarjeta', true) ?></a></p>
                    <p class="link">Guarda el enlace de la historia: <a href="<?php the_permalink() ?>"><?php the_permalink() ?></a></p>
                    <p class="link">C&oacute;digo de la historia: <a href="<?php the_permalink() ?>"><?php echo $post->ID ?></a></p>
                </div>
            <?php endif; ?>
            <?php get_template_part("historia") ?>
            <? if (isset($wp_query->query_vars['tgc_gracias'])) : ?>
                    <p class="redes_aviso">Además automáticamente se publica en la página de Facebook de The Good Chain y se crea un Twitter de forma totalmente anónima para que todos sepan que las cadenas de favores siguen creciendo.</p>
            <?php endif; ?>
                </div>
        <?php get_sidebar( ); ?>
                </div>
            </div>
<?php get_footer(); ?>
