<?php
App::uses('AppModel', 'Model');
    class Produto extends AppModel{
        public $actsAs = array(
            'Containable',
            'Crud' => array(
                'editFields' => array(
                'Produto.id',
                'Produto.nome',
                'Produto.preco_custo',
                'Produto.preco_venda',
                'Produto.categoria_id',
                'Produto.descricao',
                'Produto.quantidade_inicial'
                ),
                'editContain' => array(
                    'Categoria' => array('fields' => array('id', 'nome')),
                    'Materia' => array('fields' => array('id', 'nome')),
                ),
                'viewFields' => array(
                    'Produto.id',
                    'Produto.nome',
                    'Produto.preco_custo',
                    'Produto.preco_venda',
                    'Produto.categoria_id',
                    'Produto.descricao',
                    'Produto.quantidade_inicial'
                ),
                'viewContain' => array(
                    'Categoria' => array('fields' => array('id', 'nome')),
                    'Materia' => array('fields' => array('id', 'nome')),
                ),
            ),
        );

        public $belongsTo = array (
            'Categoria'
        );

        public $hasAndBelongsToMany = array(
            'Materia'
        );

        public $validate = array(
            'nome' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'categoria_id' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'preco_custo' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'preco_venda' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'descricao' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'quantidade_inicial' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
        );

        public function beforeSave($options = array()) {
            $continue = true;
            if (!empty($this->data['Produto']['preco_custo'])) {
                $data = str_replace(',', '.', $this->data['Produto']['preco_custo']);
                $data = str_replace('R$', '', $this->data['Produto']['preco_custo']);
                $this->data['Produto']['preco_custo'] = $data;  
            }
            if (!empty($this->data['Produto']['preco_venda'])) {
                $data = str_replace(',', '.', $this->data['Produto']['preco_venda']);
                $data = str_replace('R$', '', $this->data['Produto']['preco_venda']);
                $this->data['Produto']['preco_venda'] = $data;  
            }

            return $continue;

        }
}

?>