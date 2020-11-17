<?php
App::uses('AppModel', 'Model');
    
    class Materia extends AppModel {
        public $actsAs = array(
            'Containable',
            'Crud' => array(
                'editFields' => array(
                'Materia.id', 
                'Materia.nome',
                'Materia.valor',
                'Materia.quantidade'
                ),
                'editContain' => array(
                    'Produto' => array('fields' => array('id', 'nome')),
                ),
                'viewFields' => array(
                    'Materia.id', 
                    'Materia.nome',
                    'Materia.valor',
                    'Materia.quantidade'
                ),
                'viewContain' => array(
                    'Produto' => array('fields' => array('id', 'nome')),
                ),
            ),
        );

        public $belongsTo = array (
            'Produto'
        );

        public $validate = array(
            'nome' => array(
                'IsUniqueCategoria' => array(
                    'rule' => array('isUnique', array('nome', 'estabelecimento_id'), false),
                    'message' => 'Materia Prima já existente.'
                ),
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe a categoria com mais de 3 dígitos')
            )
        );

        
        public function beforeSave($options = array()) {
            $continue = true;
            if (!empty($this->data['Materia']['valor'])) {
                $data = str_replace(',', '.', $this->data['Materia']['valor']);
                $data = str_replace('R$', '', $this->data['Materia']['valor']);
                $this->data['Materia']['valor'] = $data;  
            }
        
            return $continue;

        }
}

?>

