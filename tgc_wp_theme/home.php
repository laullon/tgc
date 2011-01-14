<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior">
        <div id="tarjeta" class="izqHome">
            <h3>¿Has recibido una tarjeta?</h3>
            <p>Introduce el código y descubre su historia</p>
			<p class="tarjIncorrecta" id="tarjIncorrecta">Formato de la tarjeta invalida. Inténtalo de nuevo</p>
            <input type="textbox" name="tarjeta" id="tgc_code"/>
            <a id="tarjeta" class="ir" href="/tarjeta/">ir &gt;</a>
        </div>
        <div id="historia" class="der">
            <div class="allDer">
                <?php if (!is_user_logged_in()) : ?>
                    <h3>ES MUY SENCILLO</h3>
                    <ul class="bulletsCard">
                        <li>Alguien te hace un favor</li>
                        <li>Te entrega una tarjeta</li>
                        <li>Registras el favor en la web</li>
                        <li>Haces un favor y entregas la tarjeta</li>
                    </ul>
                    <div class="textAccion">
                        <p class="textAccion1">Una pequeña acción</p>
                        <p>puede cambiar al mundo</p>
                        <p>si se hace desde el corazón</p>
                    </div>
                    <p class="usuCadena">¿Ya eres usuario y quieres seguir tus Tarjetas/Historias?</p>
                <?php get_template_part("login_form") ?>

                <?php else : ?>
                <?php $user = wp_get_current_user(); ?>
                        <h3>Bienvenido <?php echo $user->display_name ?></h3>
                        <h4>Tus Tarjetas:</h4>
                        <?php tgc_lista_tarjetas_usuario(); ?>
                        <h4>Tus Historias:</h4>
                        <?php tgc_lista_historias_usuario(); ?>
                <?php endif; ?>
                        <div class="partIntBottom">
                            <a href="/tarjetas/">COMPRA TARJETAS</a>
                            <a href="/como-funciona/">C&Oacute;MO FUNCIONA</a>
                        </div>

                        <!--a id="historia" class="ir" href="/historia/">ir &gt;</a-->
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>
