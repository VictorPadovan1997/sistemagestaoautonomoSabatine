<?php
App:: uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http'); 


class EstabelecimentosController extends AppController{

    public $uses = array('Estabelecimento', 'Usuario');
    
   
    public $paginate = array (
        'fields' => array(
            'Estabelecimento.id',
            'Estabelecimento.nome_fantasia',
        ),
        'condition' => array(),
        'limit' => 10,
        'order' => array ('Estabelecimento.id' => 'desc')
    );
    

    public function setPaginateConditions(){
      
    }


    public function addRecebendoDadosExternos() {
        $this->layout = false;
        $response = array('message'=>'erro esperado um POST');
        if ($this->request->is('post')){
            $data = $this->request->input('json_decode', true);
            if (empty($data)){
                $data = $this->request->data;
            }
            $response = array('status'=>'failed', 'message'=>'Informe os dados');
            if (!empty($data)) {
                $this->Estabelecimento->salvaEstabelecimento($data);
                $conditions = array('Estabelecimento.codigo' => $data['Estabelecimento']['codigo']);
                $findEstabelecimentoGravado = $this->Estabelecimento->find('first', compact('conditions'));
                $idEstabelecimento = $findEstabelecimentoGravado['Estabelecimento']['id'];
                $conditions = array('Usuario.identificador' => $data['Usuario']['identificador']);
                $findUsuario = $this->Usuario->find('first', compact('conditions'));
                $this->Usuario->gravaIdEstabelecimento($idEstabelecimento, $findUsuario['Usuario']);
                $response = array('code' => '200', 'message'=>'Done');
            }
        }

        $this->response->type('application/json');
        $this->response->body(json_encode($response));

        return $this->response->send();

    }

}

?>