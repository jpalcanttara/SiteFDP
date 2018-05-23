<?php

ob_start();
date_default_timezone_set("America/Sao_Paulo");
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

require_once '../M/lumine-conf.php';
require_once '../M/lumine/Lumine.php';
$cfg = new Lumine_Configuration($lumineConfig);
register_shutdown_function(array($cfg->getConnection(), 'close'));

require_once './DataControlEx.php';
require_once './TokenControl.php';
require_once './RequestControl.php';

try {
    $control = new RequestControl($_REQUEST);
    //TODO:
    //validar tokens
    //TokenControl::validate(md5($control->_token.$_SERVER['REMOTE_ADDR']));
    $control->run();
} catch (Exception $ex) {
    echo "Houve um Erro ao processar: " . $ex;
}
ob_flush();
?>

