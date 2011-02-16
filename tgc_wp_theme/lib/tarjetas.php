<?php

function tarjetas() {
    global $wp_query, $tarjeta;
    $GLOBALS['tgc_tarjeta'] = $wp_query->query_vars['tgc_tarjeta'];
    $gracias=$wp_query->query_vars['tgc_gracias']=="true";
    tgc_guardar_historia();
    if (tgc_es_tarjeta_valida ()) {
        if ($tarjeta->activa && !$gracias) {
            get_template_part('tarjeta_historias');
        } else {
            get_template_part('tarjeta');
        }
    } else {
        header("location: /?error=true");
    }
    die;
}

function tgc_es_tarjeta_valida() {
    global $wpdb, $tgc_tarjeta, $tarjetas_tabla;
    $t = tgc_cargar_tarjeta($tgc_tarjeta);
    $GLOBALS['tarjeta'] = $t;
    return $tgc_tarjeta == $t->cardCode;
}

function tgc_cargar_tarjeta($tgc_tarjeta){
    global $wpdb,$tarjetas_tabla;
    $sql = $wpdb->prepare("SELECT * FROM {$tarjetas_tabla} WHERE cardCode='%s'", $tgc_tarjeta);
    $t = $wpdb->get_row($sql);
    return $t;
}

function tgc_lista_tarjetas_usuario() {
    global $tarjetas_tabla, $wpdb;
    if (is_user_logged_in ()) {
        $user = wp_get_current_user();
        $user_id = $user->ID;
        $sql = $wpdb->prepare("SELECT cardcode FROM {$tarjetas_tabla} WHERE user_id='{$user_id}' order by `cardModified`");
        $tarjetas = $wpdb->get_col($sql);
        if (count($tarjetas) > 0) {
            echo "<ul class='lista_tarjetas'>";
            foreach ($tarjetas as $tarjeta) {
                echo "<li><a href='/tarjeta/{$tarjeta}'>{$tarjeta}</a></li>";
            }
            echo "</ul>";
        }
    }
}

function tgc_guardar_historia() {
    global $tgc_tarjeta, $tarjetas_tabla, $wpdb;

    require_once( ABSPATH . WPINC . '/ms-functions.php');
//    if ($_POST['login'] == "regitrado") {
//        if (is_user_logged_in ()) {
//            $user = wp_get_current_user();
//            $user_id = $user->ID;
//        } else {
//            global $wp_actions;
//            $user = wp_signon(array("user_login" => $_POST['log'], 'user_password' => $_POST['pwd']));
//            if (!is_wp_error($user)) {
//                $user_id = $user->ID;
//            }
//        }
//    } else if ($_POST['login'] == "anonimo") {
//        $user_id = get_user_id_from_string('anonimo');
//    }

    if (is_user_logged_in ()) {
        $user = wp_get_current_user();
        $user_id = $user->ID;
    } else {
        $user_id = get_user_id_from_string('anonimo');
    }

    if ($_POST['tgc_story']) {
        list($d, $m, $y) = explode('/', $_POST['tgc_date']);
        $post_id = wp_insert_post(array(
                    'post_author' => $user_id,
                    'post_title' => "Historia",
                    'post_content' => $_POST['tgc_story'],
                    'post_category' => array(get_cat_ID('Historias')),
                    'post_status' => 'publish'
                ));
        wp_update_post(array(
            'ID' => $post_id,
            'post_title' => "Historia " . $post_id));
        add_post_meta($post_id, "tarjeta", $tgc_tarjeta, TRUE);
        add_post_meta($post_id, "fecha", "{$y}-{$m}-{$d} 00:00:00", TRUE);
        add_post_meta($post_id, "lugar", $_POST['tgc_place'], TRUE);

        $sql = $wpdb->prepare("UPDATE {$tarjetas_tabla} SET cardModified=NOW() WHERE cardCode='{$tgc_tarjeta}'");
        $wpdb->query($sql);
        wp_redirect("/historia/{$post_id}/gracias/");
        die;
    } else if ($_POST['tgc_cuentanos']) {
        $cuentanos = $_POST['tgc_cuentanos'];
        $date = $_POST['tgc_date'];
        $lugar = $_POST['tgc_place'];
        $deseo = $_POST['tgc_deseo'];
        $sql = $wpdb->prepare("UPDATE {$tarjetas_tabla} SET activa=1,cuentanos='%s',date='%s',lugar='%s',deseo='%s',user_id='{$user_id}' WHERE cardCode='{$tgc_tarjeta}'", $cuentanos, $date, $lugar, $deseo);
        $wpdb->query($sql);
        wp_redirect("/tarjeta/{$tgc_tarjeta}/gracias/");
        die;
    }
}

function tgc_get_historias_ids($t_id) {
    global $wpdb;
    $sql = $wpdb->prepare("SELECT post_id FROM wp_postmeta WHERE meta_key='tarjeta' AND meta_value='%s'", $t_id);
    return $wpdb->get_col($sql);
}

function tgc_historias() {
    global $wpdb, $tgc_tarjeta;
    $t_id = htmlspecialchars($tgc_tarjeta);
    $historias_ids = tgc_get_historias_ids($t_id);
    query_posts(array('post__in' => $historias_ids, 'posts_per_page' => '-1'));
    if (count($historias_ids) > 0)
        if (have_posts ()) {
            get_template_part('historias');
            $res = TRUE;
        }
    return $res;
}

function tgc_numero_targeta() {
    echo tgc_get_numero_targeta();
}

function tgc_get_numero_targeta() {
    global $tgc_tarjeta;
    return htmlspecialchars($tgc_tarjeta);
}

function tgc_tarjeta_deseo() {
    global $tarjeta;
    echo $tarjeta->deseo;
}

function tgc_tarjeta_cuentanos() {
    global $tarjeta;
    echo $tarjeta->cuentanos;
}

function tgc_tarjeta_cuando() {
    global $tarjeta;
    echo mysql2date(get_option('date_format'),$tarjeta->date);
}

function tgc_tarjeta_donde() {
    global $tarjeta;
    echo $tarjeta->lugar;
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
                activa TINYINT default 0,
                cuentanos VARCHAR(255) NULL,
                date DATE NULL,
                lugar VARCHAR(255) NULL,
                deseo VARCHAR(255) NULL,
                user_id VARCHAR(255) NULL,
                PRIMARY KEY  (`cardId`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta(array($sql));

        update_option("TGC_BBDD_VERISON", BBDD_VERISON);
    }
}

?>
