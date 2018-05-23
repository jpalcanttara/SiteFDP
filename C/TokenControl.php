<?php

//echo TokenContol::start("Usuario", "save");

class TokenContol {

    public static function start($_entidade, $_operacao) {
        require_once '../M/lumine-conf.php';
        require_once '../M/lumine/Lumine.php';

        $_cfg = new Lumine_Configuration($lumineConfig);

        require_once '../M/class/Token.php';

        $date = date_create();
        date_add($date, date_interval_create_from_date_string('45 minutes'));

        $public_hash = md5("®º³☺©╣segredo**&¨%%#@$#" . strval(time()));
        $private_hash = md5($public_hash . $_SERVER['REMOTE_ADDR']);

        $token = new Token();
        $token->status = true;
        $token->entidade = $_entidade;
        $token->operacao = $_operacao;
        $token->hash = $private_hash;
        $token->expiracao = date_format($date, 'Y-m-d H:i:s');
        $token->save();
        return $public_hash;
    }

    public static function validate($str_token) {
        require_once '../M/class/Token.php';
    }

}

?>