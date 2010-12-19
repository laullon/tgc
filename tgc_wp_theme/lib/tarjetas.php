<?php

function tarjetas() {
    $GLOBALS['tgc_tarjeta'] = $wp_query->query_vars['tgc_tarjeta'];
    tgc_guardar_historia();
    get_template_part('tarjeta');
    die;
}

function tgc_guardar_historia() {
    global $tgc_tarjeta;
    require_once( ABSPATH . WPINC . '/ms-functions.php');
    if ($_POST['tgc_story']) {
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
    }else{

    }
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
            $res = TRUE;
        }
    return $res;
}

$tarjetas_tabla = "wp_tgc_tarjetas";
add_action('init', 'tgc_crear_bbdd');

function tgc_crear_bbdd() {
    global $tarjetas_tabla;
    if (get_option("TGC_BBDD_VERISON") != BBDD_VERISON) {

        $sql = "CREATE TABLE {$tarjetas_tabla} (
                `cardId` int(10) unsigned NOT NULL,
                `cardParentId` int(10) unsigned default NULL,
                `cardCode` varchar(16) NOT NULL,
                `cardType` int(10) unsigned NOT NULL default '0',
                `cardStatus` int(10) unsigned NOT NULL default '1',
                `cardCreatedBy` int(10) unsigned NOT NULL default '0',
                `cardModified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
                recibida VARCHAR(255) NULL,
                date DATE NULL,
                lugar VARCHAR(255) NULL,
                deseo VARCHAR(255) NULL,
                email VARCHAR(255) NULL,
                PRIMARY KEY  (`cardId`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta(array($sql));

        update_option("TGC_BBDD_VERISON", BBDD_VERISON);
    }
}

?>
