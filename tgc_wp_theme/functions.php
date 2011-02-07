<?php

define(BBDD_VERISON, "1.1");
require_once 'lib/tarjetas.php';
require_once 'lib/widgets.php';
require_once 'lib/historias.php';

function register_my_menus() {
    register_nav_menus(
            array('header-menu' => 'Cabecera', 'footer-menu' => 'Pie')
    );
    register_sidebars();
}

function preparar_menu() {
    if (!is_admin()) {
        wp_enqueue_script("jquery");
        wp_enqueue_script("hoverIntent", get_bloginfo('template_url') . "/superfish-1.4.8/js/hoverIntent.js");
        wp_enqueue_script("superfish", get_bloginfo('template_url') . "/superfish-1.4.8/js/superfish.js");
        wp_enqueue_script("script", get_bloginfo('template_url') . "/js/script.js");
        wp_enqueue_script("jqui", get_bloginfo('template_url') . "/js/jquery-ui-1.8.7.custom.min.js");
        wp_enqueue_script("datepicker-es", get_bloginfo('template_url') . "/js/jquery.ui.datepicker-es.js");
        wp_enqueue_style("jqui_css", get_bloginfo('template_url') . "/css/ui-lightness/jquery-ui-1.8.7.custom.css");
    }
}

add_action('init', 'tgc_activate');

function tgc_activate() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}

add_action('generate_rewrite_rules', 'tgc_rewrite_rules');

function tgc_rewrite_rules($wp_rewrite) {
    $br1 = array('tarjeta/([^/]*)/gracias$' => 'index.php?tgc_tarjeta=$matches[1]&tgc_gracias=true');
    $br2 = array('tarjeta/(.*)$' => 'index.php?tgc_tarjeta=$matches[1]');
    $br3 = array('historia/(\d*)/gracias$' => 'index.php?p=$matches[1]&tgc_gracias=true');
    $br4 = array('historia/(\d*)$' => 'index.php?p=$matches[1]');
    $wp_rewrite->rules = $br1 + $br2 + $br3 + $br4 + $wp_rewrite->rules;
}

add_filter('query_vars', 'tgc_query_vars');

function tgc_query_vars($vars) {
    $vars[] = 'tgc_tarjeta';
    $vars[] = 'tgc_gracias';
    return $vars;
}

add_action('template_redirect', 'tgc_template_redirect');

function tgc_template_redirect() {
    global $wp_query;
    if (isset($wp_query->query_vars['tgc_tarjeta'])) {
        tarjetas();
    }
}

add_action('init', 'register_my_menus');
add_action('init', 'preparar_menu');

function tgc_about() {
    if (function_exists("dbenini_plugins_list")) {
        $pf = "<a href='#PluginURI#' title='#Title#'>#Title#</a> by #Author#.&nbsp-&nbsp";
        echo '<div class="copyrightFooter">';
        $list = dbenini_plugins_list($pf);
        echo $list;
        echo '</div>';
    }
}
?>