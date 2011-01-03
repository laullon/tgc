<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php wp_head(); ?>
        <link rel="shortcut icon" href="/wp-content/themes/tgc_wp_theme/favicon.ico"/>

    </head>

    <body <?php body_class(); ?>>
        <div id="header" class="exterior">
            <div class="interior clearfix">
                <div id="menu">
                    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'sf-menu')); ?>
                </div>
                <div id="user">
                    <?php if (is_user_logged_in ()) : ?>
                    <?php wp_loginout (); ?>
                    <?php $user = wp_get_current_user(); ?>
                        <a href="/registro/?action=profile">Hola <?php echo $user->display_name ?></a>
                    <?php else : ?>
                            <a href="/registro/?action=register">Registro</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>



