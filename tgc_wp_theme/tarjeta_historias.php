<?php get_header(); ?>
<div id="cuerpo" class="exterior clearfix">
    <div id="tarjeta" class="interior clearfix">
        <div class="top">
            <h1>Ahora es tu turno</h1>
            <p>¿Te ha sorprendido? alguien ha hecho algo de forma completamente desinteresada por ti y lo único que quiere es que tu hagas algo por otra persona para seguir la cadena. <b>¡Comenta cómo ha sido tu experiencia!</b></p>
        </div>

        <div class="izq">
            <label>Esta cadena se inici&oacute; el:</label>
            <p class="marco"><?php tgc_tarjeta_cuando() ?> en <?php tgc_tarjeta_donde() ?></p>
            <label>La motivaci&oacute;n fue:</label>
            <p class="marco"><?php tgc_tarjeta_deseo() ?></p>
            <label>Estos son los eslabones de la cadena</label>
            <div id="historias" class="marco"><?php if (!tgc_historias())
    echo "sin historias" ?></div>
            <h2>¡Todos ellos han puesto la ilusión en hacer de su acción el comienzo de algo grande!</h2>
        </div>

        <div class="der">
            <div class="seccion">
                <?php get_template_part("login_form") ?>
            </div>
            <form action="/tarjeta/<?php tgc_numero_targeta() ?>/"  method="post" name="tgc_tarjeta_form">
                <div class="seccion">
                    <h2>Cu&eacute;ntanos tu historia:</h2>
                    <div class="seccion clearfix">
                        <div id="cuando">
                            <label for="tgc_date">Cu&aacute;ndo</label>
                            <input type="text" id="tgc_date" name="tgc_date" value="<?php echo $_POST['tgc_date'] ?>"/>
                        </div>
                        <div id="donde">
                            <label for="tgc_place">D&oacute;nde</label>
                            <input type="text" id="tgc_place" name="tgc_place" value="<?php echo $_POST['tgc_place'] ?>"/>
                        </div>
                    </div>
                    <div class="seccion clearfix" id="historia">
                        <label for="tgc_story">Cómo ha sido</label>
                        <textarea id="tgc_story" name="tgc_story" rows="3" cols="40"><?php echo $_POST['tgc_story'] ?></textarea>
                    </div>
                    <?php tgc_SimpleCaptcha() ?>
                </div>
                <input type="submit" value="Agregar"/>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>
