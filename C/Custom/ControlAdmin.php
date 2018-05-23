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

require_once '../DataControl.php';
require_once '../InternalControl.php';

session_start();

try {
    $ic = new InternalControl("Admin", 1, "read");
    $admin = $ic->run();
//
    if ($_POST['a_senha'] != 'd41d8cd98f00b204e9800998ecf8427e' && $_POST['n_senha'] != 'd41d8cd98f00b204e9800998ecf8427e' && $_POST['c_senha'] != 'd41d8cd98f00b204e9800998ecf8427e') {
        if ($_POST['a_senha'] != $admin->passAdmin) {
            $_SESSION['msg'] = "Senha Atual não confere! Tente novamente.";
            finish();
        }
//
        if ($_POST['n_senha'] != $_POST['c_senha']) {
            $_SESSION['msg'] = "Confirmação da Senha não confere! Tente novamente.";
            finish();
        }

        $admin->passAdmin = $_POST['n_senha'];
    }
//
    $admin->nomeAdmin = $_POST['nomeAdmin'];
    $admin->save();
    $_SESSION['msg'] = "Dados alterados com sucesso!";
    finish();
//
} catch (Exception $ex) {
    echo "Houve um Erro ao processar: " . $ex;
}

function finish() {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

ob_flush();
?>