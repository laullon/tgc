<?php

function register_my_menus() {
    register_nav_menus(
            array('header-menu' => 'Cabecera', 'footer-menu' => 'Pie')
    );
}

function preparar_menu() {
    wp_enqueue_script("jquery");
    wp_enqueue_script("hoverIntent", get_bloginfo('template_url') . "/superfish-1.4.8/js/hoverIntent.js");
    wp_enqueue_script("superfish", get_bloginfo('template_url') . "/superfish-1.4.8/js/superfish.js");
    wp_enqueue_script("script", get_bloginfo('template_url') . "/js/script.js");
}

add_action('init', 'tgc_activate');

function tgc_activate() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}

add_action('generate_rewrite_rules', 'tgc_rewrite_rules');

function tgc_rewrite_rules($wp_rewrite) {
    $br = array('tarjeta/(.*)$' => 'index.php?tgc_tarjeta=$matches[1]');
    $br2 = array('historia/(.*)$' => 'index.php?p=$matches[1]');
    $wp_rewrite->rules = $br + $br2 + $wp_rewrite->rules;
}

add_filter('query_vars', 'tgc_query_vars');

function tgc_query_vars($vars) {
    $vars[] = 'tgc_tarjeta';
    return $vars;
}

add_action('template_redirect', 'tgc_template_redirect');

function tgc_template_redirect() {
    global $wp_query;

    if (isset($wp_query->query_vars['tgc_tarjeta'])) {
        $GLOBALS['tgc_tarjeta'] = $wp_query->query_vars['tgc_tarjeta'];
        tgc_guardar_historia();
        get_template_part('tarjeta');
        die;
    }
}

add_action('init', 'register_my_menus');
add_action('init', 'preparar_menu');

function tgc_numero_targeta() {
    global $tgc_tarjeta;
    echo htmlspecialchars($tgc_tarjeta);
}

function tgc_cargar_historias() {
    global $wpdb, $tgc_tarjeta;
    $t_id = htmlspecialchars($tgc_tarjeta);
    $sql = $wpdb->prepare("SELECT post_id FROM wp_postmeta WHERE meta_key='tarjeta' AND meta_value='%s'", $t_id);
    $p_ids = $wpdb->get_col($sql);
    query_posts(array('post__in' => $p_ids));
    if (count($p_ids) > 0)
        if (have_posts ()) {
            get_template_part('historias');
            $res=TRUE;
        }
    return $res;
}

function tgc_guardar_historia() {
    global $tgc_tarjeta;
    require_once( ABSPATH . WPINC . '/ms-functions.php');
    if ($_POST['tgc_story'] && $tgc_tarjeta) {
        $user_id = get_user_id_from_string($_POST['tgc_email']);
        if (!$user_id)
            $user_id = get_user_id_from_string('anonimo');

        $post_id = wp_insert_post(array(
                    'post_author' => $user_id,
                    'post_title' => "Historia",
                    'post_content' => $_POST['tgc_story'],
                    'post_category' => array(get_cat_ID('Historias')),
                    'post_status' => 'publish'
                ));
        add_post_meta($post_id, "tarjeta", $tgc_tarjeta, TRUE);
        add_post_meta($post_id, "lugar", $_POST['tgc_location'], TRUE);
    }
}

?>
