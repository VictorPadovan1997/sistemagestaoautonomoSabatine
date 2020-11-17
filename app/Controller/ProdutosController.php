<?php
App:: uses('AppController', 'Controller');

class ProdutosController extends AppController {
    public $uses = array('Produto', 'Materia');

    public $paginate = array(
        'fields' => array(
            'Produto.id', 
            'Produto.nome',
            'Produto.preco_custo',
            'Produto.preco_venda',
        ),
        'contain' => array(
            'Categoria' => array('fields' => array('Categoria.id', 'Categoria.nome'))
        ),
        'group' => 'Produto.id',
        'order' => array('Produto.id' => 'desc'),
        'limit' => 10   
    );

    public function setPaginateConditions() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if ($this->request->is('post') && !empty($this->request->data['Produto']['nome'])) {
            $this->paginate['conditions']['Produto.nome LIKE'] = '%' . trim($this->request->data['Produto']['nome']) . '%';
        }

        $this->paginate['conditions']['Produto.estabelecimento_id'] = $this->Auth->user('Usuario.estabelecimento_id'); 
    }

    public function add() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        
        if (!empty($this->request->data)) {
            if ($this->Produto->saveAll($this->request->data)) {
                if ($this->request->data['Produto']['utiliza_materia_prima'] == 'Sim') {
                    $idProduto = $this->Produto->getLastInsertID();
                    $this->redirect('/materias/addDadosMateriaPrimaEmProdutos/' . $idProduto);
                } else {
                    $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                    $this->redirect('/produtos');
                }
            }
        }
        $this->buscaCategorias();
        $this->buscaMateriaPrima();
    }

    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Produto->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/produtos');
            }
        } else {
            $fields  = array(
                'Produto.id',
                'Produto.nome',
                'Produto.preco_custo',
                'Produto.preco_venda',
                'Produto.categoria_id',
                'Produto.descricao',
                'Produto.quantidade_inicial',
                'Produto.utiliza_materia_prima'
            );
            $contain =  array('Categoria', 'Materia');
            $conditions = array('Produto.id' => $id);
            $this->request->data = $this->Produto->find('first', compact('fields', 'conditions', 'contain'));
        }
        $this->buscaCategorias();
        $this->buscaMateriaPrima();
    }

}
?>