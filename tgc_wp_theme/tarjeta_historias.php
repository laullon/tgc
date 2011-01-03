<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div id="tarjeta" class="interior clearfix">
        <div class="top">
            <h1>Ahora es tu turno</h1>
            <p>¿Te ha sorprendido? alguien ha hecho algo de forma completamente desinteresada por ti y lo único que quiere es que tu hagas algo por otra persona para seguir la cadena. <b>¡Comenta cómo ha sido tu experiencia!</b></p>
        </div>

        <div class="izq">
            <p>el deseo de la persona que comenzó esta cadena fué.</p>
            <p class="marco"><?php tgc_tarjeta_deseo() ?></p>
            <p>Todas estas personas han tenido en su mano esta misma tarjeta.</p>
            <div id="historias" class="marco"><?php if (!tgc_historias())
    echo "sin historias" ?></div>
            <h2>¡Todos ellos han puesto la ilusión en hacer de su acción el comienzo de algo grande!</h2>
        </div>

        <div class="der">
            <form action="/tarjeta/<?php tgc_numero_targeta() ?>/"  method="post" name="tgc_tarjeta_form">
                <div id="cuando">
                    <label for="tgc_date">Cuando</label>
                    <input type="text" id="tgc_date" name="tgc_date" value="<?php echo $_POST['tgc_date'] ?>"/>
                </div>
                <div id="donde">
                    <label for="tgc_place">Donde</label>
                    <input type="text" id="tgc_place" name="tgc_place" value="<?php echo $_POST['tgc_place'] ?>"/>
                </div>
                <div id="historia">
                    <label for="tgc_story">¿Cómo ha sido?</label>
                    <textarea id="tgc_story" name="tgc_story" rows="3" cols="40"><?php echo $_POST['tgc_story'] ?></textarea>
                </div>
                <div id="eslabon">
                    <label for="tgc_tarjeta">Este es tu código de eslabón</label>
                    <input type="text" id="tgc_tarjeta" name="tgc_tarjeta" value="<?php tgc_numero_targeta() ?>"/>
                    <p>Para hacer un seguimiento de la cadena puedes apuntar tu código.</p>
                </div>
                <?php get_template_part("login_form") ?>
                <input type="submit" value="Agregar"/>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>
