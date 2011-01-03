<?php

function widget_lista_tarjetas_usuario($args) {
    if (is_user_logged_in ()) {
        extract($args);
        echo $before_widget;
        echo $before_title . "Tus Tarjetas";
        echo $after_title;
        tgc_lista_tarjetas_usuario();
        echo $after_widget;
    }
}

function widget_lista_historias_usuario($args) {
    if (is_user_logged_in ()) {
        extract($args);
        echo $before_widget;
        echo $before_title . "Tus Historias";
        echo $after_title;
        tgc_lista_historias_usuario();
        echo $after_widget;
    }
}

function widgets_init() {
    register_sidebar_widget('lista tarjetas usuario', 'widget_lista_tarjetas_usuario');
    register_sidebar_widget('lista historias usuario', 'widget_lista_historias_usuario');
}

add_action("init", "widgets_init");
?>
