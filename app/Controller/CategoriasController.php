<?php
App:: uses('AppController', 'Controller');

class CategoriasController extends AppController {
    public $uses = array('Categoria');

    public $paginate = array(
        'fields' => array(
            'Categoria.id', 
            'Categoria.nome'
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Categoria.id' => 'desc')    
    );

    public function setPaginateConditions() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if ($this->request->is('post') && !empty($this->request->data['Categoria']['nome'])) {
            $this->paginate['conditions']['Categoria.nome LIKE'] = '%' . trim($this->request->data['Categoria']['nome']) . '%';
        }

        $this->paginate['conditions']['Categoria.estabelecimento_id'] = $this->Auth->user('Usuario.estabelecimento_id'); 
    }

    public function delete($id) {
  
        $this->Categoria->delete($id);
       
        $this->Flash->bootstrap('Excluído com sucesso!', array('key' => 'success'));
        $this->redirect('/categorias');
    }



}
?>