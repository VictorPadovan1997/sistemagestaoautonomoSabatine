<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Venda.estabelecimento_id', array('value' => AuthComponent::user('Usuario.estabelecimento_id')));

$this->assign('title', 'Vendas');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Venda.numero', array(
    'label' => array('text' => 'Número'),
    'div' => array('class' => 'form-group col-md-4'),
    )) .
    $this->Form->input('Venda.total_produto', array(
        'label' => array('text' => 'Total Produto'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group offset-2 col-md-4'),
    )) . 
    $this->Form->input('Venda.densconto', array(
        'label' => array('text' => 'Total Desconto'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-4'),
    )) . 
    $this->Form->input('Venda.produto_id', array(
        'label' => array('text' => 'Produto'),
        'div' => array('class' => ' form-group offset-2 col-md-4'),
        'empty' => '-- Selecione o produto --',
        'type' => 'select',
        'options' => $produtos
    )) . 
    $this->Form->input('Venda.cliente_id', array(
        'label' => array('text' => 'Clientes'),
        'div' => array('class' => ' form-group  col-md-4'),
        'empty' => '-- Selecione o cliente --',
        'type' => 'select',
        'options' => $clientes
    ))
);

$this->assign('formFields', $formFields);
?>