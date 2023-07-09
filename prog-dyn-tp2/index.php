
<?php

require_once('config/config.php');
require_once('lib/core.php');
$module = isset($_REQUEST['module'])? safe($_REQUEST['module']) : $config['default_module'];
$action = isset($_REQUEST['action'])? safe($_REQUEST['action']) : $config['default_action'];

//(www)index.php?module=user&action=create

$controller_file = 'controllers/'.ucfirst($module).'Controller.php';

//echo $controller_file;

if(!file_exists($controller_file)){
    trigger_error('Invalid Controller');
    exit;
}
require_once($controller_file);

$function = strtolower($module).'_controller_'.$action;

//echo $function;

if(!function_exists($function)){
    trigger_error('Invalid Controller Action');
    exit;
}

call_user_func($function, $_REQUEST);
?>

