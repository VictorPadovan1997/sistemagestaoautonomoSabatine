<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Categoria.estabelecimento_id', array('value' => AuthComponent::user('Usuario.estabelecimento_id')));
$formFields .= $this->Form->hidden('Categoria.id');

$this->assign('title', 'Categorias');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Categoria.nome', array(
    'label' => array('text' => 'Nome'),
    'div' => array('class' => 'form-group col-md-4'),
    ))
);

echo $this->Html->script('projeto');
$this->assign('formFields', $formFields);
?>