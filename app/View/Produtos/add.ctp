<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Produto.estabelecimento_id', array('value' => AuthComponent::user('Usuario.estabelecimento_id')));

$this->assign('title', 'Produtos');

$formFields .= $this->Html->div(
    'form-row mt-4',
    $this->Form->input('Produto.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4 '),
        'class' => 'form-control',
        'label' => array('text' => 'Nome *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
    )) .
    $this->Form->input('Produto.categoria_id', array(
        'type' => 'select',
        'empty' => '--- Selecione a Categoria ---',
        'options' => $categorias,
        'required' => false,
        'label' => array('text' => 'Categoria *'),
        'div' => array('class' => 'form-group col-md-6 offset-md-2'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
    )) .
    $this->Form->input('Produto.preco_custo', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4 '),
        'class' => 'form-control',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'label' => array('text' => 'Preço de Custo *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Produto.preco_venda', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6 offset-md-2'),
        'class' => 'form-control',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'label' => array('text' => 'Preço de Venda *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
    )) .
    $this->Form->input('Produto.quantidade_inicial', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control',
        'label' => array('text' => 'Qtd. Inicial em Estoque *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
    ))
);


$formFields .= $this->Html->div(
        'form-row ',
        $this->Html->div(
            'col-md-6 form-group ocultaDiv',
            $this->Html->para('h4', 'Esse Produto utiliza matéria prima ?') .
                $this->Html->div(
                    'form-check form-check-inline',
                    $this->Form->input(
                        'Produto.utiliza_materia_prima',
                        array(
                            'legend' => false,
                            'required' => false,
                            'type' => 'radio',
                            'options' => array('Sim' => 'Sim', 'Nao' => 'Nao'),
                            'class' => 'form-check-input mb-2',
                            'div' => false,
                            'label' => array('class' => ' form-check-label mr-3 mb-2'),
                            'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
                        )
                    )
                )
        )
    );

$formFields .= $this->Html->div(
        'form-row',
    $this->Form->input('Produto.descricao', array(
        'type' => 'textarea',
        'required' => false,
        'div' => array('class' => 'form-group col-md-12 mr-2'),
        'class' => 'form-control',
        'label' => array('text' => 'Descrição *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
    ))
);

$this->assign('formFields', $formFields);
?>