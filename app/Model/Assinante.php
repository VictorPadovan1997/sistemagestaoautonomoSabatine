<?php
App::uses('AppModel', 'Model');
    
    class Assinante extends AppModel {
        public $actsAs = array('Containable');

        public $belongsTo = array(
            'Estabelecimento'
        );

        public $validate = array(
            'identificador' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'isUnique' => array('rule' => 'isUnique', 'message' => 'Não é possível cadastrar novamente um mesmo Assinante'),
            ),
            'nome' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'cpf' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'isUnique' => array('rule' => 'isUnique', 'message' => 'CPF já existe'),
            ),
            'login' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'senha' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'estabelecimento_id' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'email' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
        );
}

?>