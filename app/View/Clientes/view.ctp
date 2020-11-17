<?php
$this->extend('/Common/form');
$this->assign('title', 'Clientes');
$formFields .= $this->element('formCreate');
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