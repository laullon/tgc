<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior">
        <div id="tarjeta" class="izqHome">
            <h3>¿Has recibido una tarjeta?</h3>
            <p>Introduce el código y descubre su historia</p>
            <input type="textbox" name="tarjeta"/>
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
                    <p class="usuCadena">¿Ya eres usuario y quieres seguir una cadena?</p>
                    <div class="partInt">
                        <form action="/registro/?action=login" method="post">
                            <div>
                                <p class="boxCard">Nombre:</p>
                                <input type="text" name="log"/>
                            </div>
                            <div>
                                <p class="boxCard">Clave:</p>
                                <input type="password" name="pwd"/>
                            </div>
                            <p class="submit">
                                <input type="submit" name="wp-submit" id="wp-submit" value="Log In">
                                <input type="hidden" name="redirect_to" value="http://tgc.laullon.com/registro/">
                                <input type="hidden" name="testcookie" value="1">
                                <input type="hidden" name="instance" value="">
                            </p>
                        </form>
                    </div>
                <?php else : ?>
                <?php $user = wp_get_current_user(); ?>
                        <h3>Bienvenido <?php echo $user->display_name ?></h3>
                        <h4>Tus Trajetas:</h4>
                        <?php tgc_lista_tarjetas_usuario(); ?>
                        <h4>Tus Historias:</h4>
                        <?php tgc_lista_historias_usuario(); ?>
                <?php endif; ?>
                        <div class="partIntBottom">
                    <?php if (!is_user_logged_in()) : ?>
                            <a href="/registro/?action=register">REGISTRASE COMO USUARIO</a>
                    <?php endif; ?>
                            <a href="#">COMPRA TARJETAS</a>
                            <a href="#">VISITA EL TOUR</a>
                        </div>

                        <!--a id="historia" class="ir" href="/historia/">ir &gt;</a-->
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>
