<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');


$formFields .= $this->Html->tag('h4', 'Adicionar Modulo', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Modulo.nome', array(
        'label' => array('text' => 'Nome'),
        'div' => array('class' => 'form-group col-md-3'),
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Modulo.descricao', array(
    'label' => array('text' => 'Observações '),
    'div' => array('class' => 'form-group col-md-9'),
    'class' => 'form-control',
    'type' => 'textarea',
    'placeholder' => 'Ex: Descreva a Historia...'
    )) 
);

$this->assign('formFields', $formFields);
?>
