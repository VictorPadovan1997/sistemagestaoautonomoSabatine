<?php

$this->extend('/Common/form');
$this->assign('title', 'Clientes');
$formFields .= $this->Form->hidden('Cliente.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->element('formCreate');
$formFields .= $this->Form->hidden('Cliente.id');
$this->assign('title', 'Clientes');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Cliente.nome', array(
    'label' => array('text' => 'Nome'),
    'div' => array('class' => 'form-group col-md-4'),
    )) . 
    $this->Form->input('Cliente.cpf', array(
        'label' => array('text' => 'CPF'),
        'div' => array('class' => 'form-group offset-2 col-md-4'),
    )) . 
    $this->Form->input('Cliente.cnpj', array(
        'label' => array('text' => 'CNPJ'),
        'div' => array('class' => 'form-group col-md-4'),
    ))
);


$this->assign('formFields', $formFields);