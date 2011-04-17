<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior clearfix fondo">
        <div id="codigos" class="izq">
            <?php tgc_trozo("home_1") ?>
            <input type="textbox" name="tarjeta"/>
            <a id="tarjeta" class="ir" href="/tarjeta/">ir &gt;</a>
            <?php tgc_trozo("home_noti") ?>
        </div>
        <div id="portada" class="der">
            <?php if (!is_user_logged_in()) : ?>
            <?php tgc_trozo("home_2") ?>
            <?php else : ?>
            <?php $user = wp_get_current_user(); ?>
                    <div id="userhome">
                        <h1>Hola <?php echo $user->display_name ?></h1>
                        <div class="seccion">
                            <h2 class="widgettitle">Tus Tarjetas:</h2>
                    <?php tgc_lista_tarjetas_usuario(); ?>
                </div>
                <div class="seccion">
                    <h2 class="widgettitle">Tus Historias:</h2>
                    <?php tgc_lista_historias_usuario(); ?>
                </div>
            </div>
            <?php endif; ?>
                    <div id="links" class="seccion">
                        <a href="/tarjetas/">COMPRA TARJETAS</a>
                        <a href="/como-funciona/">C&Oacute;MO FUNCIONA</a>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>
