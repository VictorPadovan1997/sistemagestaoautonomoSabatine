<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$formFields .= $this->Form->hidden('Modulo.id');
$formFields .= $this->Html->tag('h4', 'Visualizar Modulo', array('class' => 'mt-4'));
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
    )) 
);
$formFields .= $this->Html->tag('h4', 'Estabelecimentos', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$acordion = '';
foreach ($this->request->data['Estabelecimento'] as $estabelecimento) {
    $acordion .= $this->Html->div('card',
    $this->Html->div('card-header',
        $this->Html->tag('h2',
            $this->Form->button(
                $this->Html->tag('span', $estabelecimento['nome_fantasia'], array('class' => 'ml-4')) ,
                array(
                    'class' => 'btn btn-link',
                    'type' => 'button',
                    'data-toggle' => 'collapse',
                    'data-target' => '#collapse' . $estabelecimento['id'],
                    'aria-expanded' => false,
                    'aria-controls' => 'collapse' . $estabelecimento['id'],
                )
            ),
            array('class' => 'mb-0')
        ),
        array('id' => 'heading' . $estabelecimento['id']))
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


