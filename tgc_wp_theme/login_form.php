<div id="login" class="clearfix">
    <div class="tabs clearfix">
        <a class="tab_control selec" href="#regitrado">Regitrado</a>
        <a class="tab_control" href="#crear">Crear cuenta</a>
        <a class="tab_control" href="#anonimo">Anonimo</a>
    </div>
    <div id="regitrado" class="tab clearfix">
        <?php if (is_user_logged_in ()) : $user = wp_get_current_user(); ?>
            <p>Estas logeado como <?php echo $user->display_name ?></p>
        <?php wp_loginout("/tarjeta/" . tgc_get_numero_targeta()); ?>
        <?php else : ?>
                <p>ya estás registrado?</p>
                <div id="user">
                    <label for="tgc_user">Nombre</label>
                    <input type="text" id="tgc_user" name="tgc_log" value="<?php echo $_POST['log'] ?>"/>
                </div>
                <div id="pass">
                    <label for="tgc_password">Password</label>
                    <input type="password" id="tgc_password" name="tgc_pwd"/>
                </div>
        <?php endif; ?>
    </div>
    <div id="crear" class="tab clearfix">
        <p>registrate para seguir tus tarjetas e historias:</p>
        <a href="/registro/?action=register">Formulario de Registro</a>
    </div>
    <div id="anonimo" class="tab clearfix">
        <p>No es obligatorio registrarte pero en este caso recuerda que el sistema no recordará tus tarjetas ni tus números de historias. Tendrás que anotarlos o recordarlos externamente  para seguir el  recorrido de tus tarjetas más adelante.</p>
    </div>
</div>
