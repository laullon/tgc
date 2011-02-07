<?php get_header(); ?>
<?php $gracias = $wp_query->query_vars['tgc_gracias'] == "true"; ?>
<div id="cuerpo" class="exterior clearfix">
    <div id="tarjeta" class="interior clearfix">
        <div class="top">
            <h1>Bienvenida, bienvenido</h1>
            <p>Entre todos podemos cambiar el mundo si cambiamos nosotros, si nos concentramos en las pequeñas cosas y si tocamos el corazón de las personas con las que nos cruzamos en el día a día.</p>
        </div>

        <div class="izq">
            <p>Comenzar una cadena es como plantar un árbol, tienes la oportunidad de traer alegría y ver crecer el número de acciones. Puedes tocar a miles de personas en el corazón.</p>
            <p>Realiza una buena acción anónima o un pequeño gesto de bondad desinteresada a cualquier persona ¡todos necesitamos una sonrisa! Esas pequeñas cosas pueden representar a veces mucho para quien lo recibe. Por ejemplo:</p>
            <ul class="seccion">
                <li>Págale el peaje al de atrás.</li>
                <li>Déjale tu papelito de turno a otra persona con prisa en la cola.</li>
                <li>Págale un café a un desconocido</li>
                <li>Mándale una entradas a un evento a un amigo de forma anónima</li>
            </ul>
            <p>Entrégale a esa persona esta tarjeta para que ella a su vez se inspire a hacer otra buena acción y siga la cadena.</p>
            <p>Si necesitas inspiración, puedes leer más en el menu <a href="/inspiracion/">Inspiraci&oacute;n</a> o ver lo que ha sucedido a muchas otras personas en <a href="/category/historias-destacadas/">Historias</a>. Verás que pronto se te ocurrirán más y más oportunidades para ayudar a los demás y generar sonrisas.</p>
            <h3>¡Empezar una cadena de buenas acciones es empezar a cambiar el mundo a mejor!</h3>
        </div>
        <?php if (!$gracias) : ?>
            <div class="der">
                <form action="/tarjeta/<?php tgc_numero_targeta() ?>/"  method="post" name="tgc_tarjeta_form">
                    <div class="seccion">
                    <?php get_template_part("login_form") ?>
                </div>
                <div id="cuentanos" class="seccion">
                    <label for="tgc_cuentanos">Cu&eacute;ntanos cómo la has recibido</label>
                    <textarea id="tgc_cuentanos" name="tgc_cuentanos" rows="3" cols="40"></textarea>
                </div>
                <div class="seccion clearfix">
                    <div id="cuando">
                        <label for="tgc_date">Cu&aacute;ndo</label>
                        <input type="text" id="tgc_date" name="tgc_date"/>
                    </div>
                    <div id="donde">
                        <label for="tgc_place">D&oacute;nde</label>
                        <input type="text" id="tgc_place" name="tgc_place"/>
                    </div>
                </div>
                <div id="deseo" class="seccion">
                    <label for="tgc_deseo">Qu&eacute; te motiva a empezar esta cadena</label>
                    <textarea id="tgc_deseo" name="tgc_deseo" rows="3" cols="40"></textarea>
                </div>
                <input type="submit" value="Agregar"/>
            </form>
        </div>
        <?php else: ?>
                        <div class="der">
                            <h2>¡Gracias por poner el primer eslabón!</h2>
                            <div id="cuentanos" class="seccion">
                                <label for="tgc_cuentanos">Cu&eacute;ntanos cómo la has recibido</label>
                                <div class="marco"><?php tgc_tarjeta_cuentanos() ?></div>
                            </div>
                            <div class="seccion clearfix">
                                <div id="cuando">
                                    <label for="tgc_date">Cu&aacute;ndo</label>
                                    <div class="marco"><?php tgc_tarjeta_cuando() ?></div>
                                </div>
                                <div id="donde">
                                    <label for="tgc_place">D&oacute;nde</label>
                                    <div class="marco"><?php tgc_tarjeta_donde() ?></div>
                                </div>
                            </div>
                            <div id="deseo" class="seccion">
                                <label for="tgc_deseo">Qu&eacute; te motiva a empezar esta cadena</label>
                                <div class="marco"><?php tgc_tarjeta_deseo() ?></div>
                            </div>
                        </div>
        <?php endif; ?>
                    </div>
                </div>
<?php get_footer(); ?>
