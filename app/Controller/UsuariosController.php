<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {



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
        $this->layout = 'login';
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());

            }
            $this->Flash->bootstrap('Usuário ou senha incorretos', array('key' => 'danger'));
        }
           
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
}
?>