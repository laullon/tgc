<?php

add_action('generate_rewrite_rules', 'tgc_api_rewrite_rules');
add_filter('query_vars', 'tgc_api_query_vars');
add_action('template_redirect', 'tgc_api_template_redirect');

function tgc_api_rewrite_rules($wp_rewrite) {
    $br = array(
        'api/([^/]*)/([^/]*)' => 'index.php?tgc_api_cmd=$matches[1]&tgc_id=$matches[2]&tgc_api=true',
        'api/([^/]*)' => 'index.php?tgc_api_cmd=$matches[1]&tgc_api=true',
    );
    $wp_rewrite->rules = $br + $wp_rewrite->rules;
}

function tgc_api_query_vars($vars) {
    $vars[] = 'tgc_id';
    $vars[] = 'tgc_api';
    $vars[] = 'tgc_api_cmd';
    return $vars;
}

function tgc_api_template_redirect() {
    global $wp_query;
    if (isset($wp_query->query_vars['tgc_api'])) {
        tgc_api_main();
        die;
    }
}

function tgc_api_main() {
    global $wp_query;
    $cmd = $wp_query->query_vars['tgc_api_cmd'];
    if ($cmd === "tarjeta") {
        tgc_api_cmd_tarjeta();
    } else if ($cmd === "historia") {
        tgc_api_cmd_historia();
    } else if ($cmd === "test") {
        tgc_api_cmd_test();
    } else if ($cmd === "login") {
        tgc_api_cmd_login();
    } else if ($cmd === "user") {
        tgc_api_cmd_user();
    } else {
        sendResponse(500, "cmd='{$cmd}'");
    }
}

function tgc_api_cmd_tarjeta() {
    global $wp_query;
    $t_id = $wp_query->query_vars['tgc_id'];
    $t = tgc_cargar_tarjeta($t_id);
    if (isset($t)) {
        $h_ids = tgc_get_historias_ids($t_id);
        sendResponse(200, Array("tarjeta" => $t, "historias" => $h_ids));
    } else {
        sendResponse(404, "Tarjeta no valida");
    }
}

function tgc_api_cmd_historia() {
    global $wp_query;
    $h_id = $wp_query->query_vars['tgc_id'];
    if (is_numeric($h_id)) {
        $h = get_post($h_id);
        if (isset($h)) {
            sendResponse(200, $h);
        } else {
            sendResponse(404, "Historia no valida");
        }
    } else if ($h_id == "nueva") {
        if (isset($_POST)) {
            extract($_POST);
            $h_id = tgc_crear_historia($tarjeta, $historia, $fecha, $lugar);
            sendResponse(200, $h_id);
        } else {
            sendResponse(500, "solo POST");
        }
    } else {
        sendResponse(500, "Error '{$$h_id}'");
    }
}

function tgc_api_cmd_test() {
    sendResponse(200, "test ok");
}

function tgc_api_cmd_login() {
    if (isset($_POST)) {
        $creds = array();
        $creds['user_login'] = $_POST['user'];
        $creds['user_password'] = $_POST['pass'];
        $creds['remember'] = true;
        $user = wp_signon($creds, false);
        if (is_wp_error($user)) {
            $err = preg_replace("#(<[^>]*>)#", "", $user->get_error_message());
            sendResponse(500, $err);
        } else {
            sendResponse(200, array("id" => $user->data->ID, "user_login" => $user->data->user_login));
        }
    } else {
        sendResponse(500, "solo POST");
    }
}

function tgc_api_cmd_user() {
    global $wp_query;
    $acction = $wp_query->query_vars['tgc_id']; /// XXX igual no lo necesito
    if ($acction === "info") {
        if (is_user_logged_in ()) {
            $user_info->tarjetas = tgc_tarjetas_usuario();
            $user_info->historias = tgc_historias_usuario();
            sendResponse(200, $user_info);
        } else {
            sendResponse(500, "Error: Sesion caducada");
        }
    } else {
        sendResponse(500, $acction);
    }
}

function sendResponse($status = 200, $body = '', $content_type = 'text/html') {
    $status_header = 'HTTP/1.1 ' . $status . ' ';
    header($status_header);
    header('Content-type: ' . $content_type);
    if ($body != '') {
        echo json_encode($body);
    }
}

?>
