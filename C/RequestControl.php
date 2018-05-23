<?php

/*
  Esta classe é responsavel por receber TODOS as requisições ($_REQUEST) e retornar o formato desejado.
  $_REQUEST['sr_header'] = <token>|<entidade>|<[id]>|<operacao>|<formato_retorno>

  token = gerado por "token_form+ip"
  entidade = nome_tabela
  id = chave primária do registro a ser operado, é opcional somente se a operação for read ou create_form
  operacao = read, save, save+file, multifile, delete, delete+file, create_form

  //6125srtyd84fgyawretyo158srdftpli|Usuario|1|save|sjson

  Formatos possíveis de retorno: json, fallback, html

 */

class RequestControl {

    public $operacoes = array(
        "read" => "leitura",
        "save" => "gravação",
        "save+file" => "gravação",
        "multifile" => "gravação de arquivo",
        "delete" => "exclusão",
        "delete+file" => "exclusão",
        "create_form" => "criação"
    );
    public $_request;
    public $_sr_header;
    public $_token;
    public $_entidade;
    public $_id;
    public $_operacao;
    public $_retorno;
    public $_lumine_object;

    function __construct($_request) {

        $this->_sr_header = $_request['sr_header'];
        $_aux_arr = explode("|", $this->_sr_header);
        unset($_request['sr_header']);

        $this->_request = $_request;

        $this->_token = $_aux_arr[0];
        $this->_entidade = $_aux_arr[1];
        $this->_id = $_aux_arr[2];
        $this->_operacao = $_aux_arr[3];
        $this->_retorno = $_aux_arr[4];
    }

    public function run() {
        switch ($this->_operacao) {
            case 'read':
                $this->read();
                break;
            case 'save':
                $this->save();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'save+file':
                $this->saveAndFile();
                break;
            case 'delete+file':
                $this->deleteAndFile();
                break;
            default :
                $this->operacaoInexistente();
                return;
        }
    }

    private function read() {
        $dataControl = new DataControl($this->_entidade);
        if ('' != $this->_id) {
            $dataControl->_lumine_object->get($this->_id);
        } else {
            $dataControl->_lumine_object->find();
        }
        $this->_lumine_object = $dataControl->_lumine_object;
        $this->output();
    }

    private function save() {
        $dataControl = new DataControl($this->_entidade, $this->_request);
        $dataControl->_lumine_object->save();
        $this->_lumine_object = $dataControl->_lumine_object;
        $this->output();
    }

    private function saveAndFile() {
        $dataControl = new DataControl($this->_entidade, $this->_request);
        //
        $the_file = $_FILES['the_file'];
        if ($the_file['size'] > 0) {
            $destination = "../R/uploads/" . $this->_entidade . "/";
            @mkdir($destination, 0777, true);
            //
            $new_filename = (time() . RequestControl::clearSpecialChars($the_file['name']));
            $destination .= $new_filename;
            move_uploaded_file($the_file['tmp_name'], $destination);
            $dataControl->_lumine_object->theFile = $new_filename;
        }
        //
        $dataControl->_lumine_object->save();
        $this->_lumine_object = $dataControl->_lumine_object;
        $this->output();
    }

    private function delete() {
        $dataControl = new DataControl($this->_entidade, $this->_request);
        $dataControl->_lumine_object->delete();
        $this->_lumine_object = $dataControl->_lumine_object;
        $this->output();
    }

    private function deleteAndFile() {
        $dataControl = new DataControl($this->_entidade, $this->_request);
        unlink($destination = "../R/uploads/" . $this->_entidade . "/" . $dataControl->_lumine_object->theFile);

        $dataControl->_lumine_object->delete();
        $this->_lumine_object = $dataControl->_lumine_object;
        $this->output();
    }

    private function output() {
        session_start();
        $_SESSION['msg'] = "Processo de " . $this->operacoes[$this->_operacao] . " de " . $this->_entidade . " realizado com sucesso!";

        switch ($this->_retorno) {
            case 'json':
                header('Content-type: application/json; charset=utf-8');
                if ($this->_lumine_object->count() > 1) {
                    $this->_lumine_object->find();
                    echo $this->_lumine_object->allToJSON(true);
                } else {
                    echo $this->_lumine_object->toJSON(true);
                }
                break;
            case 'fallback':
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;
            case 'html':
                $this->doHTML();
                break;
        }
    }

    private function doHTML() {
        switch ($this->_operacao) {
            case 'read':
                //TODO:
                //criar método para gerar form
                throw new Exception("Implementação futura");
                break;
            case 'create_form':
                //TODO:
                //criar método para gerar form
                throw new Exception("Implementação futura importante, favor terminar assim que puder!");
                break;
            case 'save':
            case 'save+file':
            case 'multifile':
            case 'delete':
            case 'delete+file':
                echo "$this->_entidade $this->_operacao com sucesso!";
                break;
            default:
                break;
        }
    }

    public static function clearSpecialChars($str = '', $separator = '_') {
        //$str = strtolower($str);
        setlocale(LC_ALL, 'pt_BR.utf-8');
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = trim($clean);
        $clean = preg_replace("/[^.a-zA-Z0-9\/_| -]/", '', $clean);
        //$clean = strtolower(trim($clean, $separator));
        $clean = preg_replace("/[\/_| -]+/", $separator, $clean);
        return $clean;
    }

    public function get_request() {
        return $this->_request;
    }

    public function get_sr_header() {
        return $this->_sr_header;
    }

    public function get_token() {
        return $this->_token;
    }

    public function get_entidade() {
        return $this->_entidade;
    }

    public function get_id() {
        return $this->_id;
    }

    public function get_operacao() {
        return $this->_operacao;
    }

    public function get_retorno() {
        return $this->_retorno;
    }

    public function set_request($_request) {
        $this->_request = $_request;
    }

    public function set_sr_header($_sr_header) {
        $this->_sr_header = $_sr_header;
    }

    public function set_token($_token) {
        $this->_token = $_token;
    }

    public function set_entidade($_entidade) {
        $this->_entidade = $_entidade;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function set_operacao($_operacao) {
        $this->_operacao = $_operacao;
    }

    public function set_retorno($_lumine_object) {
        $this->_retorno = $_lumine_object;
    }

}
?>

