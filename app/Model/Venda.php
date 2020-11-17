<?php
App::uses('AppModel', 'Model');
    
    class Venda extends AppModel {
    public $actsAs = array(
        'Containable',
        'Crud' => array(
            'editFields' => array(
                'Venda.id',
                'Venda.numero',
                'Venda.total_produto',
                'Venda.total_desconto'
            ),
            'editContain' => array(
                'Cliente' => array('fields' => array('id', 'nome')),
                'Produto' => array('fields' => array('id', 'nome')),
            ),
            'viewFields' => array(
                'Venda.id',
                'Venda.numero',
                'Venda.total_produto',
                'Venda.total_desconto'
            ),
            'viewContain' => array(
                'Cliente' => array('fields' => array('id', 'nome')),
                'Produto' => array('fields' => array('id', 'nome')),
            ),
        ),
    );

    public $belongsTo = array (
        'Cliente', 'Produto'
    );

    public $validate = array(
        'numero' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        )
    );

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Venda']['total_produto'])) {
            $data = str_replace(',', '.', $this->data['Venda']['total_produto']);
            $data = str_replace('R$', '', $this->data['Venda']['total_produto']);
            $this->data['Venda']['total_produto'] = $data;  
        }
        if (!empty($this->data['Venda']['total_desconto'])) {
            $data = str_replace(',', '.', $this->data['Venda']['total_desconto']);
            $data = str_replace('R$', '', $this->data['Venda']['total_desconto']);
            $this->data['Venda']['total_desconto'] = $data;  
        }

        return $continue;

    }
}

?>

