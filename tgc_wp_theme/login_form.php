<div id="login">
    <input type="radio" name="login" value="regitrado" CHECKED>Regitrado
    <input type="radio" name="login" value="anonimo">Anonimo
</div>
<div id="regitrado">
    <?php if (is_user_logged_in ()) : $user = wp_get_current_user(); ?>
        <p>Estas logeado como <?php echo $user->display_name ?></p>
    <?php wp_loginout("/tarjeta/" . tgc_get_numero_targeta()); ?>
    <?php else : ?>

            <div id="user">
                <label for="tgc_user">Nombre</label>
                <input type="text" id="tgc_user" name="tgc_log" value="<?php echo $_POST['log'] ?>"/>
            </div>
            <div id="pass">
                <label for="tgc_password">Password</label>
                <input type="password" id="tgc_password" name="tgc_pwd"/>
            </div>
            <a href="#">Crear cuenta</a>
    <?php endif; ?>
</div>
<div id="anonimo">
    Aqui va el captcha
</div>
