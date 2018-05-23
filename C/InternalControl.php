<?php

class InternalControl {

    public $_entidade;
    public $_id;
    public $_operacao;
    public $_lumine_object;

    function __construct($_entidade, $_id, $_operacao) {

        $this->_entidade = $_entidade;
        $this->_id = $_id;
        $this->_operacao = $_operacao;
    }

    public function run() {
        switch ($this->_operacao) {
            case 'read':
                return $this->read();
            case 'save':
                return $this->save();
            case 'delete':
                return $this->delete();
            case 'save+file':
                return $this->saveAndFile();
            default :
                return $this->operacaoInexistente();
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
        return $this->_lumine_object;
    }

    private function save() {
        $dataControl = new DataControl($this->_entidade, $this->_request);
        $dataControl->_lumine_object->save();
        $this->_lumine_object = $dataControl->_lumine_object;
        return $this->_lumine_object;
    }

    private function delete() {
        $dataControl = new DataControl($this->_entidade, $this->_request);
        $dataControl->_lumine_object->delete();
        $this->_lumine_object = $dataControl->_lumine_object;
        return $this->_lumine_object;
    }

    public function getEntidade() {
        return $this->_entidade;
    }

    public function getId() {
        return $this->_id;
    }

    public function getOperacao() {
        return $this->_operacao;
    }

    public function getLumine_object() {
        return $this->_lumine_object;
    }

    public function setEntidade($entidade) {
        $this->_entidade = $entidade;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setOperacao($operacao) {
        $this->_operacao = $operacao;
    }

    public function setLumine_object($lumine_object) {
        $this->_lumine_object = $lumine_object;
    }

}
?>

