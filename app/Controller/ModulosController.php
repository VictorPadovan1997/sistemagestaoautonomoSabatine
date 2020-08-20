<?php
App:: uses('AppController', 'Controller');

    class ModulosController  extends AppController {
        public $paginate = array (
            'fields' => array(
                'Modulo.id',
                'Modulo.nome',
            ),
            'condition' => array(),
            'limit' => 10,
            'order' => array ('Modulo.id' => 'desc')
        );
        

        public function setPaginateConditions(){
            $nome = '';
            if ($this->request->is('post')) {
                $nome = $this->request->data['Modulo']['nome'];
                $this->Session->write('Modulo.nome', $nome);
            } else {
                $nome = $this->Session->read('Modulo.nome');            
                $this->request->data('Modulo.nome', $nome);
            }
            if (!empty($nome)) {
                $this->paginate['conditions']['Modulo.nome LIKE'] = '%' .trim($nome) . '%';
            } 

        }

        public function getEditData($id) {
            $fields = array('Modulo.id', 'Modulo.nome', 'Modulo.descricao');
            $conditions = array('Modulo.id' => $id);
            $moduloFind = $this->Modulo->find('first', compact('fields', 'conditions'));
            
            return $moduloFind;
        }


}
    
    
?>