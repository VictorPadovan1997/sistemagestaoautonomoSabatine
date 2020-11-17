<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$this->assign('title', 'Produtos');
$formFields .= $this->Form->hidden('Produto.id');
$formFields .= $this->Html->div(
    'form-row',
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

if (!empty($this->request->data['Materia'])) {
    $formFields .= $this->Html->tag('hr');
    $formFields .= $this->Html->tag('h2', 'Matéria prima atribuidas:');
}

$acordion = '';
foreach ($this->request->data['Materia'] as $materia) {
    $formFields .= $this->Form->hidden($materia['Materia']['id']);
    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/tamanhos/edit/' .  $materia['Materia']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));
    $alterar = $this->Html->tag('span', $alterar, array('class' => 'hint--top float-right mr-2', 'aria-label'=> 'Alterar'));   
    $acordion .= $this->Html->div('card',
        $this->Html->div('card-header',
            $this->Html->tag('h2',
                $this->Form->button(
                    $this->Html->tag('span',  $materia['nome'], array('class' => 'ml-4')) ,
                    array(
                        'aria-expanded' => true,
                        'class' => 'btn btn-link',
                        'type' => 'button',
                        'data-toggle' => 'collapse',
                        'data-target' => '#collapse' . $materia['id'],
                        'aria-controls' => 'collapse' . $materia['id'],
                    )
                ),
                array('class' => 'mb-0')
            ),
            array('id' => 'heading' . $materia['id'])
    ) .
    $this->Html->div('collapse show',
        $this->Html->div('card-body',
            $this->Html->div('form-row',
                $this->Form->input('Materia.quantidade_materiaprima', array(
                    'div' => array('class' => 'form-group col-sm-6 col-md-4 col-lg-3'),
                    'label' => array('text' => 'Quantidade'),
                    'value' => $materia['quantidade_materiaprima'],
                )) .
                $this->Form->input('Materia.valor_materiaprima', array(
                    'required' => false,
                    'div' => array('class' => 'form-group form-group col-sm-6 col-md-4 col-lg-3'),
                    'class' => 'form-control uppercase', 
                    'label' => array('text' => 'Valor R$'),
                    'error' => array('attributes' => array('class' => 'invalid-feedback')),
                    'value' => $materia['valor_materiaprima']
                ))
            )
        ),
        array(
            'id' => 'collapse' . $materia['id'],
            'aria-labelledby' => 'heading' . $materia['id'],
            'data-parent' => '#accordion'
        )
    ) 
    );
    $form = '';
}

$formFields .= $this->Html->div('accordion', 
    $acordion,
    array('id' => 'accordion')
);

$formFields .= $this->Html->div(
    'form-row',
$this->Form->input('Produto.descricao', array(
    'type' => 'textarea',
    'required' => false,
    'div' => array('class' => 'form-group col-md-12'),
    'class' => 'form-control',
    'label' => array('text' => 'Descrição *'),
    'error' => array('attributes' => array('class' => 'invalid-feedback')),
))
);

$this->assign('formFields', $formFields);
?>