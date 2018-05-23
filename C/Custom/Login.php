<?php

ob_start();
date_default_timezone_set("America/Sao_Paulo");
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

require_once '../../M/lumine-conf.php';
require_once '../../M/lumine/Lumine.php';
$cfg = new Lumine_Configuration($lumineConfig);
register_shutdown_function(array($cfg->getConnection(), 'close'));

require_once '../../M/class/Admin.php';
require_once '../../M/class/AdminDTO.php';

session_start();

try {
    $admin = new Admin();
    $admin->where('{usernameAdmin} = ? AND {passAdmin} = ?', mysql_real_escape_string($_POST['user']), mysql_real_escape_string($_POST['pass']))->find();

    if ($admin->fetch()) {
        $_SESSION['__admin'] = $admin->toObject();
        $_SESSION['msg'] = "Sistema como $admin->nomeAdmin";
    } else {
        $_SESSION['msg'] = "Usuário/Senha inválidos";
    }
    
    
    finish();
    
    
} catch (Exception $ex) {
    echo "Houve um Erro ao processar: " . $ex;
}

function finish() {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

ob_flush();
?>