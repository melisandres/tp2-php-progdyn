<?php

/* this adds escape characters before quotes*/
function safe($param){
    return addslashes($param);
}

/* this sends content through a buffer to your layout */
function render($file, $data = null){
    $layout_file = VIEW_DIR.'/layouts/layout.php';
    ob_start();
    include_once($file);
    $content = ob_get_clean();
    include_once($layout_file);
}

?>