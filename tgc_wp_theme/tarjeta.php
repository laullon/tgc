<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div class="interior clearfix">
        <div class="parteArriba">
            <span class="imagenCorResto"></span>
            <h1 class="titleModulesTGC">Bienvenida, bienvenido</h1>
            <p class="cabeceraModTGC">Entre todos podemos cambiar el mundo si cambiamos nosotros, si nos concentramos en las pequeñas cosas y si tocamos el corazón de las personas con las que nos cruzamos en el día a día.</p>
        </div>

        <div id="tarjeta" class="izq">
            <div id="historias">
                <p class="textTarjInicial">Comenzar una cadena es como plantar un árbol, tienes la oportunidad de traer alegría y ver crecer el número de acciones que has provoado. Puede tocar a miles de personas en el corazón.</p>
                <br/>
                <p class="textTarjResto">Con una buena acción anónima o un pequeño gesto de bondad desinteresada a cualquier persona ¡todos lo necesitamos una sonrisa! Esa pequeñas cosas pueden representar a veces mucho para quien lo recibe. Por ejemplo:</p>
                <br/>
                <p class="textTarjResto">Págale el peaje al de atrás.</p>
                <p class="textTarjResto">Déjale tu papelito de turno a otra persona con prisa en la cola.</p>
                <p class="textTarjResto">Págale un café a un desconocido</p>
                <p class="textTarjResto">Mándale una entradas a un evento a un amigo de forma anónima</p>
                <br/>
                <p class="textTarjResto">Entrégale a esa persona esta tarjeta para que ella a su vez se inspire a hacer otra buena acción y siga la cadena.</p>
                <br/>
                <p class="textTarjResto">Si necesitas inspiración, puedes leer más en la página <b>IDEAS</b> o ver lo que ha sucedido a muchas otras personas en <b>HISTORIAS</b>. Cuando empiezas a pensar en ello, verás que pronto se te ocurrirán más y más oportunidades para ayudar a los demás y generar sonrisas.</p>
                <h3 class="textCadBuenasAcciones">¡Empezar una cadena de buenas acciones es empezar a cambiar el mundo a mejor!</h3>
            </div>
        </div>

        <div id="historia" class="der">
            <form action="/tarjeta/<?php tgc_numero_targeta() ?>/"  method="post" name="tgc_tarjeta_form">
                <label for="tgc_recibida" class="tarjetaCabeceraBox">¿Cuentanos cómo la has recibido?</label><br/>
                <textarea class="textareaTarjeta" id="tgc_recibida" ></textarea><br/>
                <div class="tarjetaPartD">
                    <label for="tgc_date" class="tarjetaCabeceraBox">Cuando</label><br/>
                    <input type="text" id="tgc_date" name="date1" class="TboxFecha" value=""/>
					<script language="JavaScript">
						new tcal ({
							// form name
							'formname': 'tgc_tarjeta_form',
							// input name
							'controlname': 'date1'
						});
					</script>
				</div>
                <div class="tarjetaPartI">
                    <label for="tgc_place" class="tarjetaCabeceraBox">Donde</label><br/>
                    <input type="text" id="tgc_place" name="pais" class="TboxLugarPais"/>
                </div><br/>
                <label for="tgc_recibida" class="tarjetaCabeceraBox">Pon aquí tu deseo</label><br/>
                <textarea class="textareaTarjetaDeseo" id="tgc_recibida" ></textarea><br/>

                <label for="tgc_recibida" class="tarjetaCabeceraBox">este es tu código de eslabón</label><br/>
                <textarea class="textareaTarjetaEslabon" id="tgc_recibida" ></textarea>
                <p class="tarjetaTextoEslabon">Para hacer un seguimiento de la cadena puedes apuntar tu código.</p><br/>

                <p class="tarjetaUsuPasswd">Registrate con tu nombre de usuario y contraseña</p><br/>
                <label for="tgc_user" class="tarjetaCabeceraUsuPWD">Nombre</label><input type="text" id="tgc_user" name="usuario" class="TboxUsuPwd"/><label for="tgc_password" class="tarjetaCabeceraUsuPWD">Password</label><input type="password" id="tgc_password" name="password" class="TboxUsuPwd"/>
                <p class="tarjetaUsuPasswd">Si quieres también podemos avisarte a tu email cuando se produzca alguna acción con esta tarjeta</p><br/>
                <label for="tgc_email" class="tarjetaCabeceraEmail">Email</label><input type="text" id="tgc_email" name="email" class="TboxEmail"/>

                <input type="submit" value="Agregar"/>

                <h3 class="tarjetaPrimerEslabon">¡Gracias por poner el primer eslabón!</h3>

            </form>
        </div>
    </div>
</div>

<?php
//$wpdb->insert_id;
//$wpdb->update( $table_name, array( 'recibida' => , 'time' => 'value2', 'date' => '', 'deseo' => '', 'codEslabon' => '', 'email' => '' ), array( '%d', '%d', '%d', '%d', '%s%', '%d'));
?>

<?php get_footer(); ?>
