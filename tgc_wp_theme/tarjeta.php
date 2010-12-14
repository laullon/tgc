<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior clearfix">
        <div id="tarjeta" class="izq">
            <h3><?php tgc_numero_targeta() ?></h3>
            <div id="historias">
                <?php if (!tgc_cargar_historias ()) : ?>
                    <p>Bienvenido, empezar una cadena de buenas acciones, es empezar a cambiar el mundo.</p>
                    <p>Esta tarjeta es el primer eslabón. Rellena los campos siguientes y la cadena quedará activada.</p>
                    <p>Haz tu buena acción y deja con ella esta tarjeta.</p>
                <?php endif ?>
                </div>
            </div>
            <div id="historia" class="der">
                <h3>Anímate a compartir tu experiencia</h3>
                <form action="/tarjeta/<?php tgc_numero_targeta() ?>/"  method="post">
                    <label for="tgc_date">La cadena comienza el</label>
                    <input type="text" id="tgc_date" name="tgc_date" style="font-size: 150%; width: 180px;" value="12 Dec 2010">
                    <label for="tgc_location">¿Dónde inicias la cadena?</label>
                    <input type="text" id="tgc_location" name="tgc_location" style="font-size: 150%; width: 180px;" value="Madrid, España">
                    <label for="tgc_story">¿Qué te motiva a empezar esta cadena?</label>
                    <textarea id="tgc_story" class="getFocus" name="tgc_story" cols="35" rows="6" style="font-size:150%"></textarea>
                    <input type="submit" value="Compartir"/>
                    <p>RECUERDA: Si deseas hacer un seguimiento de la cadena que has iniciado, guarda el código de la tarjeta o <a id="showEmail" href="#">deja tu email</a>.</p>
                    <div id="tgc_div_email">
                        <input type="text" id="tgc_email" name="tgc_email" value="">
                        <p>Se enviará un vínculo a tu email para que puedas regresar a este punto en la historia de la tarjeta. Tu email no se comparte, vende o usa para otra cosa, garantizado.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
