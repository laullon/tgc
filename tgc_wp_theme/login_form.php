<div id="login" class="clearfix">
    <div class="tabs clearfix">
        <a class="tab_control selec" href="#regitrado">Registrado</a>
        <?php if (!is_user_logged_in()) : ?>
            <a class="tab_control" href="#crear">Crear cuenta</a>
        <?php endif; ?>
            <a class="tab_control" href="#anonimo">An&oacute;nimo</a>
        </div>
        <div id="regitrado" class="tab clearfix">
        <?php if (is_user_logged_in ()) : $user = wp_get_current_user(); ?>
                <p>Estas logeado como <?php echo $user->display_name ?></p>
        <?php //wp_loginout("/tarjeta/" . tgc_get_numero_targeta()); ?>
        <?php else : ?>
                    <p>¿ya estás registrado?</p>
                    <form action="/registro/?action=login" method="post">
                        <div id="user">
                            <label for="tgc_user">Nombre</label>
                            <input type="text" id="tgc_user" name="log" value="<?php echo $_POST['log'] ?>"/>
                        </div>
                        <div id="pass">
                            <label for="tgc_password">Password</label>
                            <input type="password" id="tgc_password" name="pwd"/>
                        </div>
                        <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit" value="Log In">
                    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER["REQUEST_URI"] ?>">
                    <input type="hidden" name="testcookie" value="1">
                    <input type="hidden" name="instance" value="">
                </p>
            </form>
        <?php endif; ?>
    </div>
    <div id="crear" class="tab clearfix">
        <p>registrate para seguir tus tarjetas e historias:</p>
        <a href="/registro/?action=register">Formulario de Registro</a>
    </div>
    <div id="anonimo" class="tab clearfix">
        <p>No es obligatorio registrarte pero en este caso recuerda que el sistema no recordará tus tarjetas ni tus números de historias. Tendrás que anotarlos o recordarlos externamente  para seguir el  recorrido de tus tarjetas más adelante.</p>
            <h3>¿Quieres ver una historia?</h3>
            <p>Introduce el código</p>
            <input type="textbox" name="historia"/>
            <a id="historia" class="ir" href="/historia/">ir &gt;</a>
    </div>
</div>
