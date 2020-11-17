<?php
App:: uses('AppController', 'Controller');

class ClientesController extends AppController {

    public $paginate = array(
        'fields' => array(
            'Cliente.id', 
            'Cliente.nome',
            'Cliente.cpf'
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Cliente.id' => 'desc')    
    );

    public function setPaginateConditions() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if ($this->request->is('post') && !empty($this->request->data['Cliente']['nome'])) {
            $this->paginate['conditions']['Cliente.nome LIKE'] = '%' . trim($this->request->data['Cliente']['nome']) . '%';
        }

        $this->paginate['conditions']['Cliente.estabelecimento_id'] = $this->Auth->user('Usuario.estabelecimento_id'); 
    }

}
?>