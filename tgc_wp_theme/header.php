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
                    <?php wp_nav_menu(array('theme_location' => 'header-menu','menu_class' => 'sf-menu')); ?>
                </div>
            </div>
        </div>
		
		<div class="versionBeta"></div>

