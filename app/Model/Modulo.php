<?php
App::uses('AppModel', 'Model');
    class Modulo extends AppModel{
        public $actsAs = array(
            'Containable',
            'Crud' => array(
                'editFields' => array('id', 'nome', 'descricao'),
                'editContain' => array(
                    'Estabelecimento' => array('fields' => array('id', 'nome_fantasia')),
                ),
            ),
        );


        public $validate = array(
            'descricao' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
        );

}

?>