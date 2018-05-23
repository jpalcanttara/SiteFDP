<?php 

/*
    Código Gerado AUTOMATICAMENTE pelo SR-PHP-CMRV em 28/04/2014 16:52:59
    www.softrom.com.br
*/

class DataControl {

    public $_lumine_object;

    function __construct($_entidade, $_request = null) {

        switch ($_entidade) {

            
            

            default :
                throw new Exception("Entidade não encontrada/disponível");
        }
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

    public function get_lumine_object() {
        return $this->_lumine_object;
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

    public function set_lumine_object($_lumine_object) {
        $this->_lumine_object = $_lumine_object;
    }

}

?>