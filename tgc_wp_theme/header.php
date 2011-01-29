<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php wp_head(); ?>
        <link rel="shortcut icon" href="/wp-content/themes/tgc_wp_theme/favicon.ico"/>
        <script type="text/javascript" src="http://fast.fonts.com/jsapi/d25e522c-556d-4cca-9a72-5b41faa634dc.js"></script>
    </head>

    <body <?php body_class(); ?>>
        <div id="header" class="exterior">
            <div class="interior clearfix">
                <div id="menu">
                    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'sf-menu')); ?>
                </div>
                <div id="user_info">
                    <?php if (is_user_logged_in ()) : ?>
                    <?php $user = wp_get_current_user(); ?>
                        <a href="/registro/?action=profile">Hola <?php echo $user->display_name ?></a>
                    <?php wp_loginout (); ?>
                    <?php else : ?>
                            <a href="/registro/?action=register">Registro</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div id="social" class="exterior">
            <div class="interior">
                <div id="iconos">
                    <a href="http://www.twitter.com/"><img src="/wp-content/themes/tgc_wp_theme/images/twitter.png" width="64" height="64" alt="sigue the good chain en Twitter"/></a>
                    <a id="facebook" href="http://facebook.com"><img src="/wp-content/themes/tgc_wp_theme/images/facebook.png" width="64" height="64" alt="sigue the good chain en facebook"/></a>
                </div>
            </div>
        </div>



