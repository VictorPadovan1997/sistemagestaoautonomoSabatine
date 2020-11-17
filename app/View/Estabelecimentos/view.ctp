<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.codigo', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control',
        'label' => array('text' => 'Codigo'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
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
$acordion = '';
foreach ($this->request->data['Modulo'] as $modulos) {
    $acordion .= $this->Html->div('card',
    $this->Html->div('card-header',
        $this->Html->tag('h2',
            $this->Form->button(
                $this->Html->tag('span', $modulos['nome'], array('class' => 'ml-4')) ,
                array(
                    'class' => 'btn btn-link',
                    'type' => 'button',
                    'data-toggle' => 'collapse',
                    'data-target' => '#collapse' . $modulos['id'],
                    'aria-expanded' => false,
                    'aria-controls' => 'collapse' . $modulos['id'],
                )
            ),
            array('class' => 'mb-0')
        ),
        array('id' => 'heading' . $modulos['id']))
    );
        $iconeimpressora = '';
        $form = '';
        $foto = '';
    }
    $formFields .= $this->Html->div('accordion', 
    $acordion,
    array('id' => 'accordion')
);

$this->assign('formFields', $formFields);
?>


