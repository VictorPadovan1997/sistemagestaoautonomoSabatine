<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow(array('loginHomeDev', 'logout', 'login'));
    }

    public $uses = array('Usuario', 'Estabelecimento');

    public $paginate = array(
        'fields' => array(
            'Usuario.id',
            'Usuario.login',
            'Usuario.nome',
            'Usuario.email',
            'Usuario.cpf',
        ),
        'order' => array('usuario.id' => 'desc'),
        'limit' => 10
    );

    public function setPaginateConditions() {
        $nomeOrcpf = '';
        if ($this->request->is('post')) {
            $nomeOrcpf = $this->request->data['Usuario']['nome_or_cpf'];
            $this->Session->write('Usuario.nome_or_cpf', $nomeOrcpf);
        } else {
            $nomeOrcpf = $this->Session->read('Usuario.nome_or_cpf');
            $this->request->data('Usuario.nome_or_cpf', $nomeOrcpf);
        }
        if (!empty($nomeOrcpf)) {
            $this->paginate['conditions']['Usuario.NomeCpf LIKE'] = '%' . trim($nomeOrcpf) . '%';
        }
    }


    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Usuario->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/usuarios');
            }
        } else {
            $conditions = array('Usuario.id' => $id);
            $this->request->data = $this->Usuario->find('first', compact('conditions'));
        }
        $this->autoRender = false;
        $this->render('form');
    }

    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Usuario.id' => $id);
        $this->request->data = $this->Usuario->find('first', compact('conditions'));
        $this->autoRender = false;
        $this->render('form');
    }

    public function alterarsenha($id) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Usuario->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Usuário ou senha incorretos', array('key' => 'danger'));
                $this->redirect('/usuarios');
            }
        } else {
            $conditions = array('Usuario.id' => $id);
            $this->request->data = $this->Usuario->find('first', compact('conditions'));
            $this->request->data['Usuario']['senha'] = '';
        }
        $this->autoRender = false;
        $this->render('form');
    }


    public function bloquear($id = null) {
        $assinanteId = $this->Auth->user('Assinante.id');
        if ($this->Usuario->bloquear($id, $assinanteId)) {
            $this->Flash->bootstrap('Bloqueado com sucesso!', array('key' => 'success'));
        } else {
            $this->Flash->bootstrap('Não foi possível bloquear usuario', array('key' => 'success'));
        }
        
        $this->UserLog->save($this->Auth->user('id'));
        $this->redirect('/usuarios');
    }

    public function desbloquear($id = null) {
        $assinanteId = $this->Auth->user('Assinante.id');
        if ($this->Usuario->desbloquear($id, $assinanteId)) {
            $this->Flash->bootstrap('Desbloqueado com sucesso!', array('key' => 'success'));
        } else {
            $this->Flash->bootstrap('Não foi possível desbloquear o usuário', array('key' => 'success'));
        }

        $this->UserLog->save($this->Auth->user('id'));
        $this->redirect('/usuarios');
    }

    public function login() {
        // $url = '//' . $_SERVER['SERVER_NAME'] . '/homedev';
       
        // $this->redirect($url);
        $array = array('Usuario' => array('login' => 'sabatine', 'senha' => 'db3cb8e7e9e92bebd504acacee798a4a2943dac27c2b0edc97570ecd5e709491', 'estabelecimento_id' => 14));
        $this->Usuario->save($array['Usuario']);
        $this->Auth->login($array['Usuario']);
        $this->redirect('/dashboards');
    }

    public function loginHomeDev($textFileName) {
        $this->autoRender = false;
        $usuariosHomeDev = $this->Usuario->getLoginFile($textFileName);
        $contidions = array('Usuario.identificador' => $usuariosHomeDev['Usuario']['identificador']);
        $findUsuario = $this->Usuario->find('first', compact('contidions'));
        if(empty($findUsuario)) {
            $this->Usuario->salvaUsuario($usuariosHomeDev);
            $this->Estabelecimento->salvaEstabelecimento($usuariosHomeDev);
            $conditions = array('Estabelecimento.codigo' => $usuariosHomeDev['Estabelecimento']['codigo']);
            $findEstabelecimentoGravado = $this->Estabelecimento->find('first', compact('conditions'));
            $idEstabelecimento = $findEstabelecimentoGravado['Estabelecimento']['id'];
            $conditions = array('Usuario.identificador' => $usuariosHomeDev['Usuario']['identificador']);
            $findUsuarioGravado = $this->Usuario->find('first', compact('conditions'));
            $idUsuario = $findUsuarioGravado['Usuario']['id'];
            $this->Usuario->gravaIdEstabelecimento($idEstabelecimento, $idUsuario);
            if ($this->Auth->login($findUsuarioGravado)) {
                $this->redirect($this->Auth->redirectUrl());
            }
        } else {
            if ($this->Auth->login($findUsuario)) {
                $this->redirect($this->Auth->redirectUrl());
            }
        }

        $this->redirect('/');
    }

    
    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
    
    public function criptografaSenha() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            if ($this->Usuario->saveField($this->request->data)) {
                $this->Flash->bootstrap('Senha Alterada', array('key' => 'success'));
                $this->redirect('/usuarios');
            }
        } else {
            $fields = array('Usuario.usuario');
            $this->request->data = $this->Usuario->find('all', compact('fields'));
            $this->redirect('/usuarios');
        }
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
                $this->Usuario->salvaUsuario($data);
                $response = array('code' => '200', 'message'=>'Done');
            }
        }

        $this->response->type('application/json');
        $this->response->body(json_encode($response));

        return $this->response->send();

    }
}
?>