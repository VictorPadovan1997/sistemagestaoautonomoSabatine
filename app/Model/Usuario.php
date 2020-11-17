<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Usuario extends AppModel {

    public $actsAs = array('Containable');


    public $virtualFields = array(
        'NomeCpf' => "CONCAT(Usuario.cpf, Usuario.nome)",
    );

    public $validate = array(
        'login' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'senha' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 4), 'message' => 'Senha deve possuir mais de 3 dígitos.', 'last' => true),
            'checkSenha' => array('rule' => 'checkSenha', 'message' => 'Senha informada não confere com a informada na confirmação.'),
            'checkLetraNumero' => array('rule' => 'checkLetraNumero', 'message' => 'A senha deve conter pelo menos uma letra e um número.', 'last' => true),
        ),
        'confirma_senha' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Confirme a senha.', 'last' => true),
        ),
        'cpf' => array(
            'isCpf' => array('rule' => 'isCpf', 'message' => 'CPF inválido'),
        ),
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório')
        ),
        'email' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'validEmail' => array('rule' => 'email', 'message' => 'E-mail inválido')
        ),
    );

    public function beforeSave($options = array()) {
 
        if (!empty($this->data['Usuario']['senha'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data['Usuario']['senha'] = $passwordHasher->hash(
                $this->data['Usuario']['senha']
            );
        }

        return true;
    }    


    public function checkSenha($check) {
        $result = true;
        if (!empty($check) && isset($this->data["Usuario"]["confirma_senha"])) {
            $values = array_values($check);
            $result = $this->data["Usuario"]["confirma_senha"] == $values[0];
        }    
        
        return $result;
    } 
    
    public function checkLetraNumero($check) {
        $temLetraNumero = false;
        $temLetra = null;
        $temNumero = null;
        $senha = array_values($check);
        if (!empty($senha)) {
            $temLetra = preg_match('|[a-zA-Z]|', $senha[0]);
            $temNumero = preg_match('|[0-9]|', $senha[0]);
            if ($temLetra && $temNumero) {
                $temLetraNumero = true;
            }
        }
        
        return $temLetraNumero;
    }

    public function bloquear($id = null, $assinanteId) {
        $this->id = $id;
        $this->bloquearOnboard($id, $assinanteId);
        $dataAtual = date('Y-m-d H:i:s');
        $bloqueio = $this->saveField('blocked', $dataAtual);
        
        return $bloqueio;
    }

    public function desbloquear($id = null, $assinanteId) {
        $this->id = $id;
        $desbloqueio = $this->saveField('blocked', null);
        $this->desbloquearOnboard($id, $assinanteId);
        
        return $desbloqueio;
    }



    public function salvaUsuario($data) {
        unset($data['Usuario']['estabelecimento_id']);
        unset($data['Usuario']['id']);
        $this->create();
        $this->save($data['Usuario']);
    }

    public function gravaIdEstabelecimento($idEstabelecimento, $idUsuario) {
        $atualizado = $this->updateAll(
            array('Usuario.estabelecimento_id' => $idEstabelecimento),
            array('Usuario.id' => $idUsuario, 'Usuario.estabelecimento_id' => null)
        );

        return $atualizado;
    }

    public function getLoginFile($fileName) {
        $file = null;
        $stringCorrigida = str_replace('\gestaoautonomo', '\homedev', ROOT);
        if (!empty($fileName)) {
            $rota = $stringCorrigida . DS . 'app' . DS . 'tmp' . DS . $fileName . '.TXT';
            $path = new File($rota);
            $file = $path->read();
            $path->close();
        }
        if (!empty($file)) {
          
            return unserialize(base64_decode(urldecode($file)));
        }
    }
}
?>