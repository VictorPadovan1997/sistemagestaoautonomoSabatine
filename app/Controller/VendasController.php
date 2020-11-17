<?php
App:: uses('AppController', 'Controller');

class VendasController extends AppController {
    public $uses = array('Venda','Cliente', 'Produto');

    public $paginate = array(
        'fields' => array(
            'Venda.id', 
            'Venda.numero',
        ),
        'contain' => array(
            'Cliente' => array('fields' => array('Cliente.id', 'Cliente.nome')),
            'Produto' => array('fields' => array('Produto.id', 'Produto.nome')),
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Venda.id' => 'desc')    
    );

    public function setPaginateConditions() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if ($this->request->is('post') && !empty($this->request->data['Venda']['numero'])) {
            $this->paginate['conditions']['Venda.numero LIKE'] = '%' . trim($this->request->data['Venda']['numero']) . '%';
        }

        $this->paginate['conditions']['Venda.estabelecimento_id'] = $this->Auth->user('Usuario.estabelecimento_id'); 
    }

}
?>