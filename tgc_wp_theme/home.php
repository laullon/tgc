<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior">
        <div id="tarjeta" class="izq">
            <div class="allIzq">
                <span class="imgHeart"></span>
                <h3 class="textCard">¿Has recibido una tarjeta?</h3>
                <p class="codeCard">Introduce el código y descubre su historia</p>
                <input type="textbox" name="tarjeta" class="textBoxCard"/>
                <a id="tarjeta" class="ir" href="/tarjeta/">ir &gt;</a>
            </div>
        </div>
        <div id="historia" class="der">
            <div class="allDer">
                <h3 class="textSencillo">ES MUY SENCILLO</h3>
                <ul class="bulletsCard">
                    <li class="bullIntCard">Alguien te hace un favor</li>
                    <li class="bullIntCard">Te entrega una tarjeta</li>
                    <li class="bullIntCard">Registras el favor en la web</li>
                    <li class="bullIntCard">Haces un favor y entregas la tarjeta</li>
                </ul>
                <div class="textAccion">
                    <p class="textAccion1">Una pequeña acción</p>
                    <p class="textAccion2">puede cambiar al mundo</p>
                    <p class="textAccion2">si se hace desde el corazón</p>
                </div>
                <p class="usuCadena">¿Ya eres usuario y quieres seguir una cadena?</p>
                <div class="partInt">
                    <form action="/registro/?action=login" method="post">
                        <div class="partIntIzq">
                            <p class="boxCard">Nombre:</p>
                            <input type="text" class="boxNaCla" name="log"/>
                        </div>
                        <div class="partIntDer">
                            <p class="boxCard">Clave:</p>
                            <input type="password" class="boxNaCla" name="pwd"/>
                        </div>
                        <p class="submit">
                            <input type="submit" name="wp-submit" id="wp-submit" value="Log In">
                            <input type="hidden" name="redirect_to" value="http://tgc.laullon.com/registro/">
                            <input type="hidden" name="testcookie" value="1">
                            <input type="hidden" name="instance" value="">
                        </p>
                    </form>
                    <div class="partIntBottom2">
                        <a href="#" class="greentextCardIzq">COMPRA TARJETAS</a>
                        <a href="#" class="greentextCardDer">VISITA EL TOUR</a>
                    </div>
                </div>

                <!--a id="historia" class="ir" href="/historia/">ir &gt;</a-->
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
