<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Estabelecimento.id');
$formFields .= $this->Form->hidden('Estabelecimento.codigo');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Estabelecimento.codigo', array(
    'label' => array('text' => 'CODIGO   *'),
    'div' => array('class' => 'form-group col-md-3'),
    'disabled' => true
    ))
);
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.nome_fantasia', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control',
        'label' => array('text' => 'Nome Fantasia *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
        $this->Form->input('Estabelecimento.cnpj', array(
            'required' => false,
            'label' => array('text' => 'CNPJ'),
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control ',
            'error' => array('attributes' => array('class' => 'invalid-feedback'))
        ))
);
$formFields .= $this->Html->tag('h4', 'Dados Endereço', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.cep', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4 '),
        'class' => 'form-control Cep',
        'label' => array('text' => 'CEP *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        'data-inputmask' => "'mask': '9', 'repeat': 8, 'greedy' : false"
    )) .
        $this->Form->input('Estabelecimento.endereco', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control Rua',
            'label' => array('text' => 'Endereço *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
        )) .
        $this->Form->input('Estabelecimento.numero', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-4 '),
            'class' => 'form-control  input Rua',
            'label' => array('text' => 'Numero *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback'))
        )) .
        $this->Form->input('Estabelecimento.bairro', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control  Bairro',
            'label' => array('text' => 'Bairro *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
        )) .
        $this->Form->input('Estabelecimento.cidade', array(
            'type' => 'text',
            'required' => false,
            'div' => array('class' => 'form-group col-md-4'),
            'class' => 'form-control Cidade',
            'label' => array('text' => 'Cidade *', 'class' => 'sem-quebradelinha'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
        )) .
        $this->Form->input('Estabelecimento.complemento', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control  input',
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            'label' => array('text' => 'Complemento')

        ))
);
$formFields .= $this->Html->tag('h4', 'Dados Responsável', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.responsavel', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4 '),
        'class' => 'form-control',
        'label' => array('text' => 'Nome *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
        $this->Form->input('Estabelecimento.telefone', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control',
            'label' => array('text' => 'Telefone *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            'placeholder' => "ex: 5514998100110"
        ))
);

$formFields .= $this->Html->tag('h4', 'Modulos', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div(
    'form-row',
$this->Form->input('Modulo.Modulo', array(
    'label' => array('text' => 'Modulos', 'class' => 'control-label'),
        'class' => ' custom-select input-large',
        'div' => array('class' => 'form-group col-md-3 '),
        'type' => 'select',
        'multiple' => true,
        'options' => $modulos,
))
);

$this->assign('formFields', $formFields);
?>


