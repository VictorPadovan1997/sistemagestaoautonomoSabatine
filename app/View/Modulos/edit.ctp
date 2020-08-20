<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Modulo.id');
$formFields .= $this->Html->tag('h4', 'Adicionar Modulo', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Modulo.nome', array(
        'label' => array('text' => 'Nome'),
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Estabelecimento', array(
        'label' => array('text' => 'Estabelecimentos', 'class' => 'control-label'),
            'class' => ' custom-select input-large',
            'div' => array('class' => 'form-group col-md-3 offset-2'),
            'type' => 'select',
            'multiple' => true,
            'options' => $estabelecimento,
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
