<div id="footer" class="exterior clearfix">
    <div class="interior clearfix">
        <div id="menu-footer"><?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?></div>
        <div class="clearfix">
            <h1>THEGOODCHAIN</h1>
        </div>
        <p class="infoFooter">Es una Asociación sin ánimo de lucro. Sin adscripción ideológica, política o religiosa. Ha sido creado por cientos de voluntarios que han contribuido con su tiempo, talento y corazón con el único objetivo de fomentar acciones de generosidad desinteresada de forma anónima y/o a personas desconocidas</p>
        <?php if (function_exists("qtrans_generateLanguageSelectCode")) : ?>
            <div id="menu-idioma"><?php qtrans_generateLanguageSelectCode() ?></div>
        <?php endif; ?>
        </div>
    </div>
    <div class="interior clearfix">
        <div class="copyrightFooter seccion">
        	THE GOOD CHAIN Calle Gobernador, 26 MADRID - CIF G86049855  -  COPYRIGHT ©2010    -   <a href="/legal/">AVISO LEGAL</a>  -  <a href="/privacidad/">PRIVACIDAD</a>
        </div>
        <!--<?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. -->
        <div class="copyrightFooter seccion">
            Funciona gracias a <a href="http://wordpress.org/">WordPress</a>
        </div>
        <div class="copyrightFooter seccion">
            Tema: <a href="https://github.com/laullon/tgc">The Good Chian</a>
        </div>
    <?php tgc_about() ?>
        </div>
<?php wp_footer() ?>**
</body>
</html>