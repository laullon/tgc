<?php
get_template_part("category-historias-destacadas");
die;
?>
<pre>
    <?php
    require_once( ABSPATH . WPINC . '/ms-functions.php');
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    global $wpdb;
    $wpdb->show_errors(true);

    $historias = $wpdb->get_results("select * from jos_thegoodchain_stories as h,wp_tgc_tarjetas as t where h.cardId=t.cardId");

    $user_id = get_user_id_from_string('anonimo');

    foreach ($historias as $historia) {
        var_dump($historia);

        $tgc_tarjeta = $historia->cardCode;

        $post_id = wp_insert_post(array(
                    'post_author' => $user_id,
                    'post_title' => "Historia",
                    'post_content' => $historia->storyText,
                    'post_category' => array(get_cat_ID('Historias')),
                    'post_date' => $historia->storyDate,
                    'post_status' => 'publish'
                ));
        wp_update_post(array(
            'ID' => $post_id,
            'post_title' => "Historia " . $post_id));
        add_post_meta($post_id, "tarjeta", $tgc_tarjeta, TRUE);
        add_post_meta($post_id, "lugar", $historia->storyLocation, TRUE);

        $sql = $wpdb->prepare("UPDATE {$tarjetas_tabla} SET cardModified=NOW(),activa=1 WHERE cardCode='{$tgc_tarjeta}'");
        $wpdb->query($sql);
    }
    ?>
</pre>
