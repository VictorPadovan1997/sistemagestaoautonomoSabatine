<?php
App::uses('AppModel', 'Model');

class Estabelecimento extends AppModel {
    public $actsAs = array(
        'Containable',
        'Crud' => array(
            'editFields' => array(
            'Estabelecimento.id',
            'Estabelecimento.nome_fantasia',
            'Estabelecimento.cnpj',
            'Estabelecimento.cep',
            'Estabelecimento.endereco',
            'Estabelecimento.numero',
            'Estabelecimento.complemento',
            'Estabelecimento.bairro',
            'Estabelecimento.cidade',
            'Estabelecimento.responsavel',
            'Estabelecimento.telefone',
            'Estabelecimento.codigo'
            ),
            'editContain' => array(
                'Modulo' => array('fields' => array('id', 'nome')),
            ),
        ),
    );


    public $hasAndBelongsToMany = array(
        'Modulo'
       );


    public $validate = array(
        'cnpj' => array(
            'isCnpj' => array('rule' => 'isCnpj', 'message' => 'CNPJ inválido'),
        ),
        
        'codigo' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'nome_fantasia' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.')
        ),
        'cep' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.')
        ),
        'endereco' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'numero' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'bairro' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'cidade' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'responsavel' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'telefone' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_segunda' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_terca' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_quarta' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_quinta' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_sexta' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_sabado' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_domingo' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
    );
   
}
?>