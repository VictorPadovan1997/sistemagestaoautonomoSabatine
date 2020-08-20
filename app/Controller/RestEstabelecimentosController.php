<?php
class RestEstabelecimentosController extends AppController {
    public $uses = array('Estabelecimento');
    public $helpers = array();
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index($codigoEstabelecimento) {
        $this->autoRender = $this->layout = false;
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
        $this->response->type('json');
        $contain = array('Modulo');
        $conditions = array('Estabelecimento.codigo' => $codigoEstabelecimento);
        $estabelecimentos = $this->Estabelecimento->find('all', compact('fields', 'contain', 'conditions'));
        $conteudo = array();
        foreach ($estabelecimentos as $modulos) {
            array_push($conteudo, $modulos['Modulo']);
        }
        
        return json_encode($conteudo);
    }
}