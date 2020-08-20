<?php
$this->extend('/Elements/form_usuarios');
$formFields = $this->Form->create('Usuario');

if ($this->request->params['action'] == 'add') {
    $this->assign('title', 'Novo Usuário');
    $formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
    $formFields .= $this->Html->tag('hr');
    
}
if ($this->request->params['action'] == 'alterarsenha') {
   $this->assign('title', 'Alterar Senha do Usuário');
   echo $this->element('header');
   $formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
   $formFields .= $this->Html->tag('hr');
   $desabilitar = true;
}
if ($this->request->params['action'] == 'edit') {
    $this->assign('title', 'Editar Usuário');
    echo $this->element('header');
    $desabilitar = true;
}
if ($this->request->params['action'] == 'view') {
    $this->assign('title', 'Usuário');
    $formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
    $formFields .= $this->Html->tag('hr');
}
$formFields .= $this->element('formCreate');
$formFields .= $this->Html->div('form-row ',
    $this->Form->input('Usuario.login', array(
        'type' => 'text',
        'label' => array('text' => 'Login'),
        'required' => false,
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        'disabled' => $desabilitar
    )) .
    $this->Form->input('Usuario.nome', array(
        'label' => array('text' => 'Nome Completo'),
        'required' => false,
        'div' => array('class' => 'form-group col-md-6 offset-md-3'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
    
);
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Usuario.email', array(
        'type' => 'text',
        'required' => false,
        'label' => array('text' => 'E-mail'),
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) . 
    $this->Form->input('Usuario.data_nascimento', array(
        'label' => array('text' => 'Data Nascimento'),
        'required' => false,
        'div' => array('class' => 'form-group col-md-6 offset-md-3'),
        'class' => 'form-control',
        'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false",
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);


$this->assign('formFields', $formFields);   