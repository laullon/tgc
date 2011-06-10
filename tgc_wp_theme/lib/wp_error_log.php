<?php
if(is_admin()) {
    add_action('admin_menu', 'wp_el_admin_menu');
}

function wp_el_admin_menu() {
    if(is_super_admin())
        add_submenu_page("index.php", "Error_Logs", "Error_Logs", 10, "wp_el", "wp_el");
}

function wp_el() {
    if(!is_super_admin()) die;
    if(isset($_GET['file'])) {
        $file=$_GET['file'];
        if(substr( $file, strlen($file) - strlen( "error_log" ) ) == "error_log") {
            if(isset($_GET['borrar'])) {
                unlink($file);
                echo "<h2>".sprintf("Fichero '%s' borrado",$file)."</h2>";
                wp_el_find();
            } else {
                echo "<p><a href='/wp/wp-admin/index.php?page=wp_el'>Volver</a></p>";
                wp_el_tail($file,false);
            }
        }
    }else {
        wp_el_find();
    }
}

function wp_el_find() {
    if(wp_el_find_files(ABSPATH, '/^error_log$/', 'wp_el_tail')==0) {
        echo "<h2>No hay error_log's</h2>";
    }
}
function wp_el_tail($filename,$lines=-10) {
    echo "<h2>$filename</h2>";

    echo "<p>";
    echo "<a href='/wp/wp-admin/index.php?page=wp_el&file=$filename'>completo</a>&nbsp;";
    echo "<a href='/wp/wp-admin/index.php?page=wp_el&file=$filename&borrar=true'>borrar</a>";
    echo "</p>";

    $arr = file( $filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
    if($arr) {
        if($lines!=false)
            $arr = array_slice($arr, $lines);
        $buf = htmlspecialchars(implode("\n",$arr));
        echo "<pre>{$buf}</pre>";
    }
}

function wp_el_find_files($path, $pattern, $callback) {
    $cont=0;
    $path = rtrim(str_replace("\\", "/", $path), '/') . '/';
    $matches = Array();
    $entries = Array();
    $dir = dir($path);
    while (false !== ($entry = $dir->read())) {
        $entries[] = $entry;
    }
    $dir->close();
    foreach ($entries as $entry) {
        $fullname = $path . $entry;
        if ($entry != '.' && $entry != '..' && is_dir($fullname)) {
            $cont+=wp_el_find_files($fullname, $pattern, $callback);
        } elseif (is_file($fullname) && preg_match($pattern, $entry)) {
            call_user_func($callback, $fullname);
            $cont++;
        }
    }
    return $cont;
}

?>