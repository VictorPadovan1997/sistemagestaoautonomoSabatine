<?php
$nomeProduto = $findProduto['Produto']['nome'];
$this->assign('title', 'Para finalizarmos especifique os valores e quantidade da Matéria Prima. <p><h4> Produto:' . ' ' . $nomeProduto);
$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$contaQuantsInput = 0;

foreach($findProduto['Materia'] as $materiaPrima) {
    $contaQuantsInput++;
    $acordion  .= $this->Html->div('card',
    $this->Html->div('card-header',
        $this->Html->tag('h2',
            $this->Form->button(
                $this->Html->tag('span', $materiaPrima['nome']) ,
                array(
                    'class' => 'btn btn-link',
                    'type' => 'button',
                    'data-toggle' => 'collapse',
                    'data-target' => '#collapse',
                    'aria-expanded' => false,
                    'aria-controls' => 'collapse',
                )
            ),
            array('class' => 'mb-0')
    ),
    array('id' => 'heading' . $materiaPrima['id'])
) .
$this->Html->div('collapse',
    $this->Html->div('card-body',
        $this->Html->div('form-row',
            $this->Form->hidden($contaQuantsInput . '.MateriasProduto.id', array('value' => $materiaPrima['MateriasProduto']['id'])) .
            $this->Form->input($contaQuantsInput . '.MateriasProduto.quantidade_materiaprima', array(
                'div' => array('class' => 'form-group col-sm-6 col-md-4 col-lg-3'),
                'label' => 'Quantidade',
                'value' => $materiaPrima['MateriasProduto']['quantidade_materiaprima']
                )) .
                $this->Form->input($contaQuantsInput . '.MateriasProduto.valor_materiaprima', array(
                    'required' => false,
                    'div' => array('class' => 'form-group form-group col-sm-6 col-md-4 col-lg-3'),
                    'class' => 'form-control',
                    'onkeypress'=>"$(this).mask('R$ 999.990,00')",
                    'label' => array('text' => 'Valor'),
                    'value' => $materiaPrima['MateriasProduto']['valor_materiaprima'],
                    'error' => array('attributes' => array('class' => 'invalid-feedback')),
                )
            )
        )
    ),
    array(
        'id' => 'collapse',
        'aria-labelledby' => 'heading',
        'data-parent' => '#accordion'
    )
));
    $iconeimpressora = '';
    $form = '';
        
}
$formFields .= $this->Html->div('accordion', 
    $acordion,
    array('id' => 'accordion')
);

$this->assign('formFields', $formFields);
?>