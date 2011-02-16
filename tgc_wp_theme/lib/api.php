<?php

add_action('generate_rewrite_rules', 'tgc_api_rewrite_rules');
add_filter('query_vars', 'tgc_api_query_vars');
add_action('template_redirect', 'tgc_api_template_redirect');

function tgc_api_rewrite_rules($wp_rewrite) {
    $br = array(
        'api/([^/]*)/([^/]*)' => 'index.php?tgc_api_cmd=$matches[1]&tgc_id=$matches[2]&tgc_api=true',
        'api/test' => 'index.php?tgc_api_cmd=test&tgc_api=true'
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
    if ($wp_query->query_vars['tgc_api_cmd'] === "tarjeta") {
        tgc_api_cmd_tarjeta();
    } else if ($wp_query->query_vars['tgc_api_cmd'] === "historia") {
        tgc_api_cmd_historia();
    } else if ($wp_query->query_vars['tgc_api_cmd'] === "test") {
        tgc_api_cmd_test();
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
    $h = get_post($h_id);
    if (isset($h)) {
        sendResponse(200, $h);
    } else {
        sendResponse(404, "Historia no valida");
    }
}

function tgc_api_cmd_test() {
    sendResponse(200, "test ok");
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
