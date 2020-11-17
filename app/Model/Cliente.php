<?php
App::uses('AppModel', 'Model');
    
class Cliente extends AppModel {

    public $actsAs = array(
        'Containable',
        'Crud' => array(
            'editFields' => array(
            'Cliente.id',
            'Cliente.nome',
            'Cliente.cpf',
            'Cliente.cnpj',
            ),
        ),
    );

    public $virtualFields = array(
        'nomeCpf' => "CONCAT(Cliente.nome, Cliente.cpf)"
    );

    public $validate = array(
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe a categoria com mais de 3 dígitos')
        ),
        'cpf' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe a categoria com mais de 3 dígitos')
        ),
        'cnpj' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe a categoria com mais de 3 dígitos')
        )
    );

}
