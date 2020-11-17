<?php
App:: uses('AppController', 'Controller');

class MateriasController extends AppController {
    public $uses = array('Materia', 'Produto', 'MateriasProduto');

    public $paginate = array(
        'fields' => array(
            'Materia.id', 
            'Materia.nome',
            'Materia.valor',
            'Materia.quantidade'
        ),
        'contain' => array(
            'Produto' => array('fields' => array('Produto.id', 'Produto.nome'))
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Materia.id' => 'desc')    
    );

    public function setPaginateConditions() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if ($this->request->is('post') && !empty($this->request->data['Materia']['nome'])) {
            $this->paginate['conditions']['Materia.nome LIKE'] = '%' . trim($this->request->data['Materia']['nome']) . '%';
        }

        $this->paginate['conditions']['Materia.estabelecimento_id'] = $this->Auth->user('Usuario.estabelecimento_id'); 
    }

    public function addDadosMateriaPrimaEmProdutos($idProduto) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->MateriasProduto->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/produtos');
            }
        }

        $conditions = array('Produto.id' => $idProduto);
        $findProduto = $this->Produto->find('first', compact('conditions'));
        $this->set('findProduto', $findProduto);
    }

    
    public function editDadosMateriaPrimaEmProdutos($idProduto) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->MateriasProduto->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/produtos');
            }
        }

        $conditions = array('Produto.id' => $idProduto);
        $findProduto = $this->Produto->find('first', compact('conditions'));
        $this->set('findProduto', $findProduto);
    }


}
?>