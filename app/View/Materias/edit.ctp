<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Materia.estabelecimento_id', array('value' => AuthComponent::user('Usuario.estabelecimento_id')));
$formFields .= $this->Form->hidden('Materia.id');

$this->assign('title', 'Matéria Primas');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Materia.nome', array(
        'label' => array('text' => 'Nome'),
        'div' => array('class' => 'form-group col-md-4'),
    )) . 
    $this->Form->input('Materia.quantidade', array(
        'label' => array('text' => 'Quantidade'),
        'div' => array('class' => 'form-group offset-2 col-md-4'),
    )) . 
    $this->Form->input('Materia.valor', array(
        'label' => array('text' => 'Valor'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-4'),
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Materia.produto_id', array(
        'label' => array('text' => 'Matéria Prima utilizada em qual produto?'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'type' => 'select',
        'options' => $produtos
    ))
);

$this->assign('formFields', $formFields);
?>