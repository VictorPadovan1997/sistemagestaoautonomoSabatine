<?php
App:: uses('AppController', 'Controller');

class EstabelecimentosController extends AppController{

    public $uses = array('Estabelecimento', 'Modulo');

    public $paginate = array (
        'fields' => array(
            'Estabelecimento.id',
            'Estabelecimento.nome_fantasia',
        ),
        'condition' => array(),
        'limit' => 10,
        'order' => array ('Estabelecimento.id' => 'desc')
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('restEstabelecimentoApi');
    }

    public function setPaginateConditions(){
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Estabelecimento']['nome_fantasia'];
            $this->Session->write('Estabelecimento.nome_fantasia', $nome);
        } else {
            $nome = $this->Session->read('Estabelecimento.nome_fantasia');            
            $this->request->data('Estabelecimento.nome_fantasia', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Estabelecimento.nome_fantasia LIKE'] = '%' .trim($nome) . '%';
        } 

    }

    public function getModulos($codigo) {
        $this->layout = false;
            $conditions = array('Estabelecimento.codigo' => $codigo);
            $findEstabelecimentos = $this->Estabelecimento->find('first', compact('conditions'));
            if (!empty($findUsuario)) {
                $response = array('status' => '404', 'message' => 'Usuario já existente.');
            }
            if (empty($findUsuario)) {
                if ($this->Assinante->save($data)) {
                    $response = array('status' => '201', 'message' => 'Usuario cadastrado');
                } else {
                    $response = array('status' => '500', 'message' => 'Falha na requisição, usuario não cadastrado.');
                }
            }
            
        $this->response->type('application/json');
        $this->response->body(json_encode($response));

        return $this->response->send();
    }

    public function getModulosAdd() {
        $fields = array('Modulo.id', 'Modulo.nome');
        $modulos = $this->Modulo->find('all', compact('fields', 'conditions'));
        
        return $modulos;
    }

    public function getEditData($id) {
        $fields = array(
            'Estabelecimento.id',
            'Estabelecimento.nome_fantasia',
            'Estabelecimento.cnpj',
            'Estabelecimento.cep',
            'Estabelecimento.endereco',
            'Estabelecimento.numero',
            'Estabelecimento.complemento',
            'Estabelecimento.bairro',
            'Estabelecimento.cidade',
            'Estabelecimento.responsavel',
            'Estabelecimento.telefone',
            'Estabelecimento.codigo'
        );
        $contain = array('Modulo');
        $conditions = array('Estabelecimento.id' => $id);
        $find = $this->Estabelecimento->find('first', compact('fields', 'conditions'));

        return $find;
    }

    
    public function restEstabelecimentoApi($codigoEstabelecimento) {
        $this->layout = false;
        
                $contain = array('Modulo');
                $conditions = array('Estabelecimento.codigo' => $codigoEstabelecimento);
                $estabelecimentos = $this->Estabelecimento->find('all', compact('fields', 'contain', 'conditions'));
                
    
            
        $this->response->type('application/json');
        $this->response->body(json_encode($estabelecimentos));

        return $this->response->send();
    }

   
}

?>