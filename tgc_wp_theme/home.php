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
                    <div class="partIntIzq">
                        <p class="boxCard">Nombre:</p>
                        <input type="text" class="boxNaCla"/>
                    </div>
                    <div class="partIntDer">
                        <p class="boxCard">Clave:</p>
                        <input type="text" class="boxNaCla"/>
                    </div>
                    <div class="partIntBottom1">
                        <p class="boxCard2">sigue tu Nº de acción</p>
                        <input type="text" name="historia" class="boxNaCla2"/>
                        <a id="historia" class="ir" href="/historia/">ir &gt;</a>
                    </div>
                    <div class="partIntBottom2">
                        <a href="#" class="greentextCardIzq">COMPRA TARJETAS</a>
                        <a href="#" class="greentextCardDer">VISITA EL TOUR</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
