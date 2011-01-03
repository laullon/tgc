<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div id="tarjeta" class="interior clearfix">
        <div class="top">
            <h1>Bienvenida, bienvenido</h1>
            <p>Entre todos podemos cambiar el mundo si cambiamos nosotros, si nos concentramos en las pequeñas cosas y si tocamos el corazón de las personas con las que nos cruzamos en el día a día.</p>
        </div>

        <div class="izq">
            <p>Comenzar una cadena es como plantar un árbol, tienes la oportunidad de traer alegría y ver crecer el número de acciones que has provoado. Puede tocar a miles de personas en el corazón.</p>
            <p>Con una buena acción anónima o un pequeño gesto de bondad desinteresada a cualquier persona ¡todos lo necesitamos una sonrisa! Esa pequeñas cosas pueden representar a veces mucho para quien lo recibe. Por ejemplo:</p>
            <ul>
                <li>Págale el peaje al de atrás.</li>
                <li>Déjale tu papelito de turno a otra persona con prisa en la cola.</li>
                <li>Págale un café a un desconocido</li>
                <li>Mándale una entradas a un evento a un amigo de forma anónima</li>
            </ul>
            <p>Entrégale a esa persona esta tarjeta para que ella a su vez se inspire a hacer otra buena acción y siga la cadena.</p>
            <p>Si necesitas inspiración, puedes leer más en la página <b>IDEAS</b> o ver lo que ha sucedido a muchas otras personas en <b>HISTORIAS</b>. Cuando empiezas a pensar en ello, verás que pronto se te ocurrirán más y más oportunidades para ayudar a los demás y generar sonrisas.</p>
            <h3>¡Empezar una cadena de buenas acciones es empezar a cambiar el mundo a mejor!</h3>
        </div>

        <div class="der">
            <form action="/tarjeta/<?php tgc_numero_targeta() ?>/"  method="post" name="tgc_tarjeta_form">
                <div id="cuentanos">
                    <label for="tgc_cuentanos">¿Cuentanos cómo la has recibido?</label>
                    <textarea id="tgc_cuentanos" name="tgc_cuentanos" rows="3" cols="40"></textarea>
                </div>
                <div id="cuando">
                    <label for="tgc_date">Cuando</label>
                    <input type="text" id="tgc_date" name="tgc_date"/>
                </div>
                <div id="donde">
                    <label for="tgc_place">Donde</label>
                    <input type="text" id="tgc_place" name="tgc_place"/>
                </div>
                <div id="deseo">
                    <label for="tgc_deseo">Pon aquí tu deseo</label>
                    <textarea id="tgc_deseo" name="tgc_deseo" rows="3" cols="40"></textarea>
                </div>
                <div id="eslabon">
                    <label for="tgc_tarjeta">Este es tu código de eslabón</label>
                    <input type="text" id="tgc_tarjeta" name="tgc_tarjeta" value="<?php tgc_numero_targeta()?>"/>
                    <p>Para hacer un seguimiento de la cadena puedes apuntar tu código.</p>
                </div>
                <?php get_template_part("login_form") ?>

                <input type="submit" value="Agregar"/>
                <h3>¡Gracias por poner el primer eslabón!</h3>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>
