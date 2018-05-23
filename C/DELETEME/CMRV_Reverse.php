<?php
ob_start();
date_default_timezone_set("America/Sao_Paulo");
//error_reporting(0);
//error_reporting(E_WARNING);
header('Content-type: text/html; charset=utf-8');

if (isset($_GET['do'])) {
    //
    $pattern1 = "case '__ENTIDADE__':
                require_once '../../M/class/__ENTIDADE__.php';
                |this->_lumine_object = new __ENTIDADE__(|_request);
                break;\n\t\t";
    $pattern1 = str_replace("|", "$", $pattern1);
    //
    $pattern2 = "case '__ENTIDADE__':
                require_once '../M/class/__ENTIDADE__.php';
                |this->_lumine_object = new __ENTIDADE__(|_request);
                break;\n\t\t";
    $pattern2 = str_replace("|", "$", $pattern2);
    //
    //
    createDocument($pattern1, "../DataControl.php");
    $buffer2 = createDocument($pattern2, "../DataControlEx.php");




    //Guarda Lista das Classes
    $handle2 = fopen('LumineList', 'w');
    fwrite($handle2, $buffer2);
    fclose($handle2);

    echo "<h1>Código Gerado:</h1>";
    highlight_file('../DataControl.php');
    echo "<hr />";
    highlight_file('../DataControlEx.php');
    echo '<h1><a href="./CMRV_Reverse.php">Retornar</a></h1>';
    exit;
}

function createDocument($pattern, $dest) {
    $path = "../../M/class/";
    $iterator = new DirectoryIterator($path);
    //
    $buffer = "";
    $buffer2 = "";
    foreach ($iterator as $i) {
        if ($i->isFile()) {
            $entidade = str_replace(".php", "", $i->getFilename());
            $buffer.= str_replace("__ENTIDADE__", $entidade, $pattern);
            $buffer2 .= "|" . $entidade;
        }
    }

    // Substitui as coisas
    $dataControlSRC = file_get_contents("DataControl_MODEL");
    $dataControlSRC = "<?php \n\n" . str_replace("__GENERATED__CASE__CODE__", $buffer, $dataControlSRC) . "\n\n?>";
    $dataControlSRC = str_replace("__DATA__", date('d/m/Y H:i:s'), $dataControlSRC);

    //Grava classe atualizada
    $handle = fopen($dest, 'w');
    fwrite($handle, $dataControlSRC);
    fclose($handle);
    //
    return $buffer2;
}

$path = "../../M/class/";
$iterator = new DirectoryIterator($path);
$actual_list = file_get_contents("LumineList");
$arr_list = array();
if (!empty($actual_list)) {
    $arr_list = explode("|", $actual_list);
    unset($arr_list[0]);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CMRV_Reverse &middot; SOFT-ROM Sistemas</title>
    </head>
    <body>
        <h3>Entidades Lumine Encontradas:</h3>
        <ol>
            <?php
            foreach ($iterator as $i) {
                if ($i->isFile()) {
                    echo "<li>" . $i->getFilename() . "</li>";
                }
            }
            ?>
        </ol>
        <h3>Entidades Atualmente Tratadas no "DataControl":</h3>
        <ol>
            <?php
            foreach ($arr_list as $aux) {
                echo "<li>" . $aux . "</li>";
            }
            ?>
        </ol>
        <hr />
        <a onclick="this.target = '_blank';" href="../../M/lumine/lib/ui/reverse.php">Lumine Reverse</a>
        <hr />        
        <a href="./CMRV_Reverse.php?do=true">Atualizar Classes - Engenharia Reversa</a>
        <hr />
    </body>
</html>