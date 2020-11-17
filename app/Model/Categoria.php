<?php
App::uses('AppModel', 'Model');
    
    class Categoria extends AppModel {
        public $actsAs = array(
            'Containable',
            'Crud' => array(
                'editFields' => array(
                'Categoria.id',
                'Categoria.nome',
                ),
            ),
        );

        public $validate = array(
            'nome' => array(
                'IsUniqueCategoria' => array(
                    'rule' => array('isUnique', array('nome', 'estabelecimento_id'), false),
                    'message' => 'Categoria já existente.'
                ),
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe a categoria com mais de 3 dígitos')
            )
        );
}

?>

